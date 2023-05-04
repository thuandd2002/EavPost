<?php
namespace AHT\SalesAgents\Model\ResourceModel;

class Salesagents extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('aht_sales_agent', 'entity_id');
    }
}