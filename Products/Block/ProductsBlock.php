<?php

namespace Devall\Products\Block;

use Devall\Products\Api\ProductsRepositoryInterface;
use Devall\Products\Model\ResourceModel\Products\Collection;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class ProductsBlock extends Template
{

    /**
     * @var ProductsRepositoryInterface
     */
    private ProductsRepositoryInterface $productsRepository;

    /**
     * @var ScopeConfigInterface
     */
    private ScopeConfigInterface $scopeConfig;

    /**
     * @var Collection
     */
    private Collection $collection;

    /**
     * @param Context $context
     * @param ProductsRepositoryInterface $productsRepository
     * @param ScopeConfigInterface $scopeConfig
     * @param Collection $collection
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        ProductsRepositoryInterface $productsRepository,
        ScopeConfigInterface $scopeConfig,
        Collection $collection,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $data
        );
        $this->scopeConfig = $scopeConfig;
        $this->productsRepository = $productsRepository;
        $this->collection = $collection;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return (bool)$this->scopeConfig->getValue('helloworld/general/enable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        ;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProductById($id) {
        return $this->productsRepository->getById($id);
    }

    public function getAllProducts() {
        return $this->collection->getItems();
    }

    /**
     * @param $company
     * @return mixed
     */
    public function saveProducts($company) {
        return $this->productsRepository->save($company);
    }
}
