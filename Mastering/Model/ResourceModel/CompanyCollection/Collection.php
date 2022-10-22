<?php

namespace Devall\Mastering\Model\ResourceModel\CompanyCollection;

use Devall\Mastering\Model\CompanyModel;
use Devall\Mastering\Model\ResourceModel\CompanyResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'company_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(CompanyModel::class, CompanyResourceModel::class);
    }
}
