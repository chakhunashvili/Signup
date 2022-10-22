<?php

namespace Devall\Mastering\Model;

use Devall\Mastering\Model\ResourceModel\CompanyResourceModel;
use Magento\Framework\Model\AbstractModel;

class CompanyModel extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'company_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(CompanyResourceModel::class);
    }

    public function getName() {
        return $this->getData('company_name');
    }

    public function setName($name) {
        $this->setData('company_name',$name);
    }
}
