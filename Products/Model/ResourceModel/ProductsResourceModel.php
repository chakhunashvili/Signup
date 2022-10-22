<?php

namespace Devall\Products\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ProductsResourceModel extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'products_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('products', 'id');
        $this->_useIsObjectNew = true;
    }
}
