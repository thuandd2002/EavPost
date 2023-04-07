<?php
namespace AHT\Eav\Controller\Post;

class Type extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    protected $request;
    protected $postFactory;
    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       \Magento\Framework\App\Request\Http $request,
       \AHT\Eav\Model\ResourceModel\Post\CollectionFactory $postFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->request = $request;
        $this->postFactory = $postFactory;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
       
        return $this->_pageFactory->create();
    }
}
