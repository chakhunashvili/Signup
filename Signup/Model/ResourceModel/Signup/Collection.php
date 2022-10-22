<?php

namespace Devall\Signup\Model\ResourceModel\Signup;

use Devall\Signup\Model\Signup;
use Devall\Signup\Model\ResourceModel\SignupResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'signup_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Signup::class, SignupResourceModel::class);
    }
}
