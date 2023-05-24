<?php
namespace AHT\Eav\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Framework\Controller\ResultFactory;
use AHT\Eav\Model\ResourceModel\Post\Collection;
class MassDelete extends Action
{    
    protected $filter;
    protected $postCollection;
    public function __construct(Context $context, Filter $filter, Collection $postCollection)
    {
        $this->filter = $filter;
        $this->postCollection = $postCollection;
        parent::__construct($context);
    }
    public function execute()
    {
        $collection = $this->filter->getCollection($this->postCollection);
        $collectionSize = $collection->getSize();
        $collection->walk('delete');
        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.', $collectionSize));
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('eav/post/index');
    }
}