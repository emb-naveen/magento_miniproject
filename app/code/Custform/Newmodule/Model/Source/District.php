<?php
namespace Custform\Newmodule\Model\Source;

use Magento\Framework\Option\ArrayInterface;

class District implements ArrayInterface
{
    /**
     * Get options for dropdown field
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => '', 'label' => __('')],
            ['value' => 'udupi', 'label' => __('udupi')],
            ['value' => 'karkala', 'label' => __('karkala')],
            ['value' => 'manipal', 'label' => __('manipal')],
            ['value' => 'Malpe', 'label' => __('Malpe')],
            ['value' => 'Kapu', 'label' => __('Kapuno')],
        ];
    }
}
