<?php

namespace Devall\Mastering\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CompanyResourceModel extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'company_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('company', 'id');
        $this->_useIsObjectNew = true;
    }
}
