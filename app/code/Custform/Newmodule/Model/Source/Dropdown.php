<?php
namespace Custform\Newmodule\Model\Source;

use Magento\Framework\Option\ArrayInterface;

class Dropdown implements ArrayInterface
{
    /**
     * Get options for dropdown field
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'yes', 'label' => __('yes')],
            ['value' => 'No', 'label' => __('no')],
        ];
    }
}
