<?php

namespace Devall\Signup\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class SignupResourceModel extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'signup_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('signup', 'id');
        $this->_useIsObjectNew = true;
    }
}
