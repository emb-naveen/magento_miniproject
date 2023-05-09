<?php
namespace Custform\Newmodule\Model\ResourceModel\Newmodule;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    
    protected function _construct()
    {
        $this->_init(
            'Custform\Newmodule\Model\Form',
            'Custform\Newmodule\Model\ResourceModel\Form');
       
    }
}