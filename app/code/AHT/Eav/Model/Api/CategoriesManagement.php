<?php
namespace AHT\Eav\Model\Api;
use AHT\Eav\Api\CategoriesManagementInterface;
use AHT\Eav\Model\CategoriesFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Controller\Result\JsonFactory;
class CategoriesManagement implements CategoriesManagementInterface
{

    private $categoriesFactory;

    private $resultJsonFactory;

    protected $response = ['success' => false];

    public function __construct(CategoriesFactory $categoriesFactory,JsonFactory $resultJsonFactory)
    {
        $this->categoriesFactory = $categoriesFactory;
        $this->resultJsonFactory = $resultJsonFactory;
    }
    /**
     * Initialize resource model
     *
     * @param string $id
     * @return void
     */
    public function getCategories(){
        try {
            $data = $this->categoriesFactory->create()->getCollection()->getData();
            return ['success' => true, 'data' => $data];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
  
}
