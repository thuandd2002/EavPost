<?php
namespace AHT\Eav\Ui\Component\Categories\Column;

use AHT\Eav\Model\ResourceModel\Categories\CollectionFactory;

class ListOptionForm implements \Magento\Framework\Option\ArrayInterface            
{
    protected $_categoryFactory;
    protected $_loadedData; 

    public function __construct(
        CollectionFactory $categoryCollectionFactory
    ){
        $this->_categoryFactory = $categoryCollectionFactory->create();
        // die;
    }
 
    public function toOptionArray()
    { 
        $categories = $this->_categoryFactory->getItems();
        $optionArray = [];
        foreach($categories as $category){
            $category = $category->getData();
            array_push($optionArray,[
                'value'  => $category['entity_id'],
                'label'  => $category['name'],
            ]);
        }
    return $optionArray;
    }
}