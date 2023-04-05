<?php
namespace AHT\Eav\Controller\Adminhtml\Post;
use AHT\Eav\Model\PostFactory;
use Magento\Backend\App\Action;
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
    public function __construct(
        Action\Context $context,
        PostFactory $postFactory
    ) {
        parent::__construct($context);
        $this->postFactory = $postFactory;
    }
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        dd($data);
        $id = !empty($data['entity_id']) ? $data['entity_id'] : null;
        $newData = [
            'name' => $data['name'],
            'content' => $data['content'],
        ];
        $post = $this->postFactory->create();
        if ($id) {
            $post->load($id);
        }
        try {
            $post->addData($newData);
            $post->save();
            $this->messageManager->addSuccessMessage(__('You saved the post.'));
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }
        return $this->resultRedirectFactory->create()->setPath('eav/post/index');
    }
}
