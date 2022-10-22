<?php

namespace Devall\Products\Model\ResourceModel\Products;

use Devall\Products\Model\Products;
use Devall\Products\Model\ResourceModel\productsResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'products_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Products::class, productsResourceModel::class);
    }
}
