<?php
namespace AHT\Eav\Model\ResourceModel\Categories;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'eav_categories_collection';
    protected $_eventObject = 'categories_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('AHT\Eav\Model\Categories', 'AHT\Eav\Model\ResourceModel\Categories');
    }
}
