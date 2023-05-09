<?php
namespace Custom\Mymodule\Model;

use Magento\Framework\Model\AbstractModel;

class Pincode extends AbstractModel
{
    /**
     * Initialize resource model.
     */
    public function _construct()
    {
        $this->_init('Custom\Mymodule\Model\ResourceModel\Pincode');
    }
}