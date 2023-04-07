<?php
namespace AHT\Eav\Controller\Adminhtml\Post;
use AHT\Eav\Model\PostFactory;
use Magento\Backend\App\Action;
use AHT\Eav\Model\Post\ImageUploader;
/**
* Class Save
* @package EavEavControllerAdminhtmlPost
*/
class Save extends Action
{
    /**
     * @var PostFactory
     */
    private $postFactory;
    /**
     * Save constructor.
     * @param ActionContext $context
     * @param PostFactory $postFactory
     */

     protected $imageUploader;

    public function __construct(
        Action\Context $context,
        PostFactory $postFactory
        , ImageUploader $imageUploader
    ) {
        parent::__construct($context);
        $this->postFactory = $postFactory;
        $this->imageUploader = $imageUploader;
    }
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['entity_id']) ? $data['entity_id'] : null;
        $newData = [
            'name' => $data['name'],
            'content' => $data['content'],
        ];
        $post = $this->postFactory->create();
            if (isset($data['image'][0]['name'])) {
                $data['images'] = $data['image'][0]['name'];
                $imageName = $data['images'];
            }else{
                $imageName = '';
            }
            $data['images'] = $imageName;
            $newData['images'] =  $data['images'];
            $newData['categoryid'] =implode(",", $data['categoryid']);
        if ($id) {
            $post->load($id);
        }
        try {
            $post->addData($newData);
            $post->save();
            $this->messageManager->addSuccessMessage(__('You saved the post.'));
            if ($imageName) {
                $this->imageUploader->moveFileFromTmp($imageName);
            }
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }
        return $this->resultRedirectFactory->create()->setPath('eav/post/index');
    }
}
