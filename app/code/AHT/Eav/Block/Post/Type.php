<?php
namespace AHT\Eav\Block\Post;

class Type extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    protected $request;
    protected $postFactory;
    protected $catFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Request\Http $request,
        \AHT\Eav\Model\ResourceModel\Post\CollectionFactory $postFactory,
        \AHT\Eav\Model\ResourceModel\Categories\CollectionFactory $catFactory,
        array $data = []
    ) {
        $this->request = $request;
        $this->postFactory = $postFactory;
        $this->catFactory = $catFactory;
        parent::__construct($context, $data);
    }

    public function getName()
    {
        $id = $this->getRequest()->getParam('entity_id');
        $collection = $this->catFactory->create();
        $data = $collection->addFieldToSelect('*')->addFieldToFilter('entity_id', ['eq' => $id]);
        return $data;
    }

    public function getTypePost()
    {
        $id = $this->getRequest()->getParam('entity_id');
        $collection = $this->postFactory->create();
        $data = $collection->addFieldToSelect('*')->addFieldToFilter('categoryid', ['like' => '%'.$id.'%']);
        $data->getData();
        
        return $data;
    }

}
