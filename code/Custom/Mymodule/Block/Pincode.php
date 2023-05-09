<?php
namespace Custom\Mymodule\Block;

use Magento\Framework\View\Element\Template;

class Pincode extends Template
{
    /**
     * Get AJAX URL for fetching state and city.
     *
     * @return string
     */
    public function getAjaxUrl()
    {
        return $this->getUrl('mymodule/index/index', ['_secure' => true]);
    }
}
