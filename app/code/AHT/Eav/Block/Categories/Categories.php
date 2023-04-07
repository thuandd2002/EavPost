<?php
namespace AHT\Eav\Block\Categories;;

class Post extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
         protected $jsLayout;
        protected $categoriesFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \AHT\Eav\Model\ResourceModel\Categories\CollectionFactory $categoriesFactory,
        array $data = []
    ) {
        $this->jsLayout = isset($data['jsLayout']) && is_array($data['jsLayout']) ? $data['jsLayout'] : [];
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
     public function getCategories()
     {
         $post = $this->categoriesFactory->create();
         $collection =$categoriesFactory->getData();
         return $collection;
     }

}
