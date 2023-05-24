<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace AHT\Eav\Model\Post;

use AHT\Eav\Model\ResourceModel\Post\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Framework\App\ObjectManager;
use AHT\Eav\Model\Post\FileInfo;
use Magento\Store\Model\StoreManagerInterface;

class DataProvider extends AbstractDataProvider
{

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var array
     */
    protected $loadedData;
    /**
     * @inheritDoc
     */
    protected $collection;
    private $fileInfo;
    protected $_storeManager; 

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        $this->_storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @inheritDoc
     */

     public function convertValues($banner)
     {
         $fileName = $banner->getImages();
         $image = [];
         if ($this->getFileInfo()->isExist($fileName)) {
             $stat = $this->getFileInfo()->getStat($fileName);
             $mime = $this->getFileInfo()->getMimeType($fileName);
             $image[0]['name'] = $fileName;
             $image[0]['url'] = $this->_storeManager->getStore()->getBaseUrl()."pub/media/eav/index/".$fileName;
             $image[0]['size'] = isset($stat) ? $stat['size'] : 0;
             $image[0]['type'] = $mime;
         }
         $banner->setImage($image);
 
         return $banner;
     }
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $model) {
            $this->loadedData[$model->getId()] = $model->getData();
        }
        $data = $this->dataPersistor->get('post');
        
        if (!empty($data)) {
            $model = $this->collection->getNewEmptyItem();
            $model->setData($data);
            $this->loadedData[$model->getId()] = $model->getData();
            $this->dataPersistor->clear('post');
        }
        
        return $this->loadedData;
    }

    private function getFileInfo()
    {
        if ($this->fileInfo === null) {
            $this->fileInfo = ObjectManager::getInstance()->get(FileInfo::class);
        }
        return $this->fileInfo;
    }
}
