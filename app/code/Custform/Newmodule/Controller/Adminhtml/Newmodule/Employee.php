<?php

namespace Custform\Newmodule\Controller\Adminhtml\Newmodule;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\Model\View\Result\ForwardFactory;

class Employee extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ACTION_RESOURCE='Custform_Newmodule::newmodule';
    /**
     * Core registry
     *
     * @var Registry
     */
    protected $coreRegistry;
    /**
     * Result PageFactory
     *
     * @var PageFactory
     *
     */
    protected $resultPageFactory;
    /**
     * @var ForwardFactory
     */
    protected $resultForwardFactory;
    /**
     * @param Registry $registry
     * @param PageFactory $resultPageFactory
     * @param ForwardFactory $resultForwardFactory
     * @param Context $context
     */
    public function __construct(
         Registry $registry,
         PageFactory $resultPageFactory,

          ForwardFactory $resultForwardFactory,
          Context $context)
          {
            $this->coreRegistry = $registry;
            $this->resultPageFactory =$resultPageFactory;

            $this->resultForwardFactory =$resultForwardFactory;
            parent::__construct($context);
          }
          /**
           * @return \Magento\Framework\View\Result\Page
           */
          public function execute()
          {

        // die("test");
        $resultPage=$this->resultPageFactory->create();
        $resultPage->addBreadcrumb(__('Employee details'), __('Employee details'));
        $resultPage->getConfig()->getTitle()->prepend(__('Add Pincode'));
        return $resultPage;


          }


        }