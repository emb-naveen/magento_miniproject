<?php
namespace Custform\Newmodule\Model;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Custform\Newmodule\Model\ResourceModel\Newmodule\CollectionFactory;


class NewmoduleProvider extends AbstractDataProvider
{
    /**
     * @var DataPersistorInterface
     */
    
    protected $dataPersistor;
    

    /**
     * @var array
     */
    protected $loadData;
    
    public function _construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $NewmoduleCollectionFactory,
        array $meta=[],
        array $data=[]
    ){
        $this->Collection=$NewmoduleCollectionFactory->create();
        parent::__construct($name,$primaryFieldName,$requestFieldName,$meta,$data);

    }
public function getdata(){
    $this->loadData=[];
    return $this->loadData;
}

}