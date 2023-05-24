<?php
namespace AHT\Eav\Model\Api;
use AHT\Eav\Api\PostManagementInterface;
use AHT\Eav\Model\PostFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Controller\Result\JsonFactory;
class PostManagement implements PostManagementInterface
{
    const CACHE_TAG = 'aht_eav_post_management';

    /**
     * Model cache tag for clear cache in after save and after delete
     *
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'post_management';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */

    private $postFactory;
    private $resultJsonFactory;

    protected $response = ['success' => false];

    public function __construct(PostFactory $postFactory,JsonFactory $resultJsonFactory)
    {
        $this->postFactory = $postFactory;
        $this->resultJsonFactory = $resultJsonFactory;
    }

    /**
     * Initialize resource model
     *
     * @param string $id
     * @return void
     */
    public function getPost(){
        try {
            $data = $this->postFactory->create()->getCollection()->getData();
            return ['success' => true, 'data' => $data];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
    
}
