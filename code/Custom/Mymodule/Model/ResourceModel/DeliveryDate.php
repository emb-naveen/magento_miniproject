<?php
namespace Custom\Mymodule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class DeliveryDate extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('sample_table', 'entity_id');
    }

    public function getDeliveryDateByPincode($pincode)
    {
        $connection = $this->getConnection();
        $select = $connection->select()->from($this->getMainTable())->where('pincode = ?', $pincode);
        return $connection->fetchRow($select);
    }
}