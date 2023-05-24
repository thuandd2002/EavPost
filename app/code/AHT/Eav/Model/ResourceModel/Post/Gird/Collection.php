<?php
namespace AHT\Eav\Model\ResourceModel\Post\Gird;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'aht_eav_post_collection';
    protected $_eventObject = 'post_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('AHT\Eav\Model\Post', 'AHT\Eav\Model\ResourceModel\Post');
    }
}
