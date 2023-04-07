<?php
namespace AHT\Eav\Controller\Adminhtml\Categories;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Framework\Controller\ResultFactory;
use AHT\Eav\Model\ResourceModel\Categories\Collection;
class MassDelete extends Action
{    
    protected $filter;
    protected $categoriesCollection;
    public function __construct(Context $context, Filter $filter, Collection $categoriesCollection)
    {
        $this->filter = $filter;
        $this->categoriesCollection = $categoriesCollection;
        parent::__construct($context);
    }
    public function execute()
    {
        $collection = $this->filter->getCollection($this->categoriesCollection);
        $collectionSize = $collection->getSize();
        $collection->walk('delete');
        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.', $collectionSize));
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('eav/categories/index');
    }
}