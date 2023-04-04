<?php
namespace AHT\Eav\Controller\Post;

use Magento\Framework\HTTP\Client\Curl;
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    protected $postFactory;
    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       \AHT\Eav\Model\ResourceModel\Post\CollectionFactory $postFactory
    )
    {
        $this ->postFactory = $postFactory;
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
//        $post = $this->postFactory->create();
//        $collection = $post -> getData();
//
//        foreach ($collection as $item){
//            echo $item['name'];
//            echo"<pre>";
//            echo $item['content'];
//        }
        return $this->_pageFactory->create();
    }
}
