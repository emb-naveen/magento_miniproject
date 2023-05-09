<?php
namespace Custform\Newmodule\Model\ResourceModel;

class Form extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
      protected function _construct()
    {
        $this->_init('sample_table','entity_id');
    }
}