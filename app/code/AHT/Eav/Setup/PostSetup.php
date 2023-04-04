<?php
    namespace AHT\Eav\Setup;
    use Magento\Eav\Setup\EavSetup;
    class Post extends EavSetup

    {
        const ENTITY_TYPE_CODE = 'post';
        public function getDefaultEntities() {
            $entities = [
                self::ENTITY_TYPE_CODE => [
                    'entity_model' => 'AHT\Eav\Model\ResourceModel\Post',
                    'table' => self::ENTITY_TYPE_CODE,
                    'increment_model' => null,
                ],
            ];
            return $entities;   
        }
    }
?>
