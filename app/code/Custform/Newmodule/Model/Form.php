<?php
namespace Custform\Newmodule\Model;
use Magento\Framework\Model\AbstractModel;

class Form extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Custform\Newmodule\Model\ResourceModel\Form');
       
    }
}