<?php

namespace Devall\Signup\Model;

use Devall\Signup\Api\Data\SignupInterface;
use Devall\Signup\Model\ResourceModel\SignupResourceModel;
use Magento\Framework\Model\AbstractModel;

class Signup extends AbstractModel implements SignupInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'signup_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(SignupResourceModel::class);
    }

    /**
     * @inheirtDoc
     */
    public function getName() {
        return $this->getData('name');
    }

    /**
     * @inheirtDoc
     */
    public function setName($name) {
        $this->setData('name',$name);
    }

    /**
     * @inheirtDoc
     */
    public function getId() {
        return $this->getData('id');
    }

    /**
     * @inheirtDoc
     */
    public function setId($id) {
        $this->setData('id',$id);
    }
    /**
     * @inheirtDoc
     */
    public function getDate() {
        return $this->getData('date');
    }

    /**
     * @inheirtDoc
     */
    public function setDate($date) {
        $this->setData('date',$date);
    }


}
