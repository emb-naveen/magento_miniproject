<?php
namespace Custom\Mymodule\Controller\Index;

use Magento\Framework\App\Action\Context;
use Custom\Mymodule\Model\DeliveryDateFactory;

class DeliveryDate extends \Magento\Framework\App\Action\Action
{
    protected $deliveryDateFactory;

    public function __construct(Context $context, DeliveryDateFactory $deliveryDateFactory)
    {
        $this->deliveryDateFactory = $deliveryDateFactory;
        parent::__construct($context);
    }

    public function execute()
{
    $result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON);

    $pincode = $this->getRequest()->getParam('pincode');
    
    if (empty($pincode) || strlen($pincode) != 6) {
        $result->setData('Please enter a valid 6 digit pincode!');
        return $result;
    }

    $deliveryDate = $this->deliveryDateFactory->create()->getDeliveryDate($pincode);
    if (!empty($deliveryDate)) {
        // system date and time
        $currentTimestamp = time();
        //integer val checking
        $daysToAdd = max(0, intval($deliveryDate)); 

        $deliveryTimestamp = strtotime("+$daysToAdd days", $currentTimestamp);
        
        $deliveryDateFormatted = date('d F Y', $deliveryTimestamp);
        $deliveryMessage = 'Delivery on ' . $deliveryDateFormatted;

        $result->setData($deliveryMessage);
    } else {
        $result->setData('Shipment is not available for this pincode!');
    }

    return $result;
}

}
