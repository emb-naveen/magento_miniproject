<?php
namespace Custom\Mymodule\Model\ResourceModel\Pincode;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('Custom\Mymodule\Model\Pincode', 'Custom\Mymodule\Model\ResourceModel\Pincode');
    }
}
