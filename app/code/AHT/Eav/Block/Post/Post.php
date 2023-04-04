<?php
namespace AHT\Eav\Block\Post;

class Post extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
         protected $jsLayout;
        protected $postFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \AHT\Eav\Model\ResourceModel\Post\CollectionFactory $postFactory,
        array $data = []
    ) {
        $this->jsLayout = isset($data['jsLayout']) && is_array($data['jsLayout']) ? $data['jsLayout'] : [];
        $this ->postFactory = $postFactory;
        parent::__construct($context, $data);
    }
    public function getName()
    {
       return 'post';

    }
    public function getJsLayout()
    {
        return \Zend_Json::encode($this->jsLayout);
    }
     public function getPost()
     {
         $post = $this->postFactory->create();
         $collection =$post->getData();
         return $collection;
     }

}
