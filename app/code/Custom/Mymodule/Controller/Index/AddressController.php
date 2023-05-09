<?php

namespace Custom\Mymodule\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Customer\Model\Session;

class AddressController extends Action
{
    protected $customerSession;

    public function __construct(
        Context $context,
        Session $customerSession
    ) {
        parent::__construct($context);
        $this->customerSession = $customerSession;
    }

    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);

        // Check if customer is logged in
        if ($this->customerSession->isLoggedIn()) {
            $customerId = $this->customerSession->getCustomerId();

            // Fetch the address data from the database
            $addressData = $this->_objectManager->create('Magento\Customer\Model\Address')->getCollection()->addFieldToFilter('customer_id',$customerId)->getLastItem()->getData();

            // Return the address data as JSON
            $result->setData($addressData);
        } else {
            $result->setData([]);
        }

        return $result;
    }
}