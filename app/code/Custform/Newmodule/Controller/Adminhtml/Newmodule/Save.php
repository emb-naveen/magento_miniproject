<?php

namespace Custform\Newmodule\Controller\Adminhtml\Newmodule;

use Custform\Newmodule\Model\Form;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Data\Form\FormKey\Validator;
use Magento\Framework\View\Result\PageFactory;

class Save extends Action
{
    /**
     * @var $model
     */
    protected $_model;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Form $model
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_model = $model;
        parent::__construct($context);
    }
    /**
     * Save data to table
     */
    public function execute()
    {
        // die("fucnction Test ");
        
        $resultPageFactory = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        // print_r($data);

        try {
            if ($data) {

                // print_r($data);
                $model = $this->_model;
                $model->setData($data)->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
                $buttondata = $this->getRequest()->getParam('back');
                if ($buttondata == 'add') {
                    return $resultPageFactory->setPath('*/*/employee');
                }
                if ($buttondata == 'close') {
                    return $resultPageFactory->setPath('*/*/index');
                }
                $id = $model->getId();
                return $resultPageFactory->setPath('*/*/employee', ['entity_id' => $id]);
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can't submit your request, Please try again."));
        }
        return $resultPageFactory->setPath('*/*/index');
    }
}

