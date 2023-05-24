<?php
namespace AHT\Eav\Model\ResourceModel\Categories\Gird;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'collection';
    protected $_eventObject = 'collection';

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
