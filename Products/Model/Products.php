<?php

namespace Devall\Products\Model;

use Devall\Products\Api\Data\ProductsInterface;
use Devall\Products\Model\ResourceModel\productsResourceModel;
use Magento\Framework\Model\AbstractModel;

class Products extends AbstractModel implements ProductsInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'products_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ProductsResourceModel::class);
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
    public function getPrice() {
        return $this->getData('price');
    }

    /**
     * @inheirtDoc
     */
    public function setPrice($price) {
        $this->setData('price',$price);
    }

    /**
     * @inheirtDoc
     */
    public function getDescription() {
        return $this->getData('description');
    }

    /**
     * @inheirtDoc
     */
    public function setDescription($description) {
        $this->setData('description',$description);
    }
}
