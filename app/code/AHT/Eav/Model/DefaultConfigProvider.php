<?php

namespace AHT\Eav\Model;

class DefaultConfigProvider implements ConfigProviderInterface
{
    /**
     * @inheritdoc
     */
    public function getConfig()
    {
        $config = [
            'name' => 'John Doe',
            'Email' => 'john@webkul.com',
            'DOB' => '08/05/1990',
        ];
        return $config;
    }
}