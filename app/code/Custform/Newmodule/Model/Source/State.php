<?php
namespace Custform\Newmodule\Model\Source;

use Magento\Directory\Model\ResourceModel\Region\CollectionFactory;
use Magento\Framework\Data\OptionSourceInterface;

class State implements OptionSourceInterface
{
    protected $regionCollectionFactory;

    public function __construct(CollectionFactory $regionCollectionFactory)
    {
        $this->regionCollectionFactory = $regionCollectionFactory;
    }

    public function toOptionArray()
    {
        $options = [];
        $regions = $this->regionCollectionFactory->create()->addFieldToFilter('country_id', 'IN')->load();
        foreach ($regions as $region) {
            $options[] = [
                'label' => $region->getDefaultName(),
                'value' => $region->getDefaultName()
            ];
        }
        return $options;
    }
}

