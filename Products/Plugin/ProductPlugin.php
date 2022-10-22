<?php

namespace Devall\Products\Plugin;

use Magento\Catalog\Model\Product;

class ProductPlugin
{
    /**
     * @param Product $subject
     * @param float $result
     * @return float
     */
    public function afterGetPrice(Product $subject, float $result): float
    {
        return $result + 10;
    }
}
