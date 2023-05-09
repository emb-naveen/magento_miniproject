<?php
namespace Custom\Mymodule\Model;

use Magento\Framework\Model\AbstractModel;

class DeliveryDate extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Custom\Mymodule\Model\ResourceModel\DeliveryDate');
    }

    public function getDeliveryDate($pincode)
    {
        $deliveryDate = null;
        $deliveryDateData = $this->getResource()->getDeliveryDateByPincode($pincode);

        if (!empty($deliveryDateData)) {
            $deliveryDate = $deliveryDateData['days'];
        }

        return $deliveryDate;
    }
}