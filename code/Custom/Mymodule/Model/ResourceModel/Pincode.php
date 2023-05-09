<?php
namespace Custom\Mymodule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Pincode extends AbstractDb
{
    /**
     * Initialize resource model.
     */
    public function _construct()
    {
        $this->_init('sample_table', 'entity_id');
    }
}