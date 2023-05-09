<?php
namespace Custform\Newmodule\Model\Source;

use Magento\Framework\Option\ArrayInterface;

class Delivery implements ArrayInterface
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
            ['value' => '2', 'label' => __('Delivered within 2 Days')],
            ['value' => '4', 'label' => __('Delivered within 4 Days')],
            ['value' => '5', 'label' => __('Delivered within 5 Days')],
            ['value' => '6', 'label' => __('Delivered within 6 Days')],
            ['value' => '30', 'label' => __('Delivered within 8 Days')],
        ];
    }
}