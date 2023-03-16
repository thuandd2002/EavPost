<?php
namespace AHT\Eav\Model\ResourceModel\Attribute;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'aht_eav_attribute_collection';
    protected $_eventObject = 'attribute_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('AHT\Eav\Model\Attribute', 'AHT\Eav\Model\ResourceModel\Attribute');
    }
}
