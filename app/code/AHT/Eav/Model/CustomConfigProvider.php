<?php
namespace AHT\Eav\Model;

class CustomConfigProvider implements ConfigProviderInterface
{
    protected $listPost;

    public function __construct(
        \AHT\Eav\Block\Post\Post $listPost
    )
    {
        $this->listPost = $listPost;
    }

    public function getConfig()
    {
        $config = [];
        $config['customData'] = $this->listPost->getPost();
        return $config;
    }
}

