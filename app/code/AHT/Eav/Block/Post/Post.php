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
        protected $categoriesFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \AHT\Eav\Model\ResourceModel\Post\CollectionFactory $postFactory,
        \AHT\Eav\Model\ResourceModel\Categories\CollectionFactory $categoriesFactory,
        array $data = []
    ) {
        $this->jsLayout = isset($data['jsLayout']) && is_array($data['jsLayout']) ? $data['jsLayout'] : [];
        $this ->postFactory = $postFactory;
        $this ->categoriesFactory = $categoriesFactory;
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
     public function getCategories()
     {
         $categories = $this->categoriesFactory->create();
         $collection =$categories->getData();
         return $collection;
     }

}
