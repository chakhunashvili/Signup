<?php

namespace Devall\Products\Model;

use Devall\Products\Api\ProductsRepositoryInterface;
use Devall\Products\Model\ResourceModel\Products\Collection;
use Devall\Products\Model\ResourceModel\Products\CollectionFactory;
use Devall\Products\Model\ResourceModel\ProductsResourceModel;

class ProductsRepository implements ProductsRepositoryInterface
{
    public function __construct(
        ProductsResourceModel $resource,
        ProductsFactory     $modelFactory,
        CollectionFactory   $collectionFactory
    ) {
        $this->resource = $resource;
        $this->modelFactory = $modelFactory;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @inheirtDoc
     */
    public function save($products)
    {
        $this->resource->save($products);
        return $products;
    }

    /**
     * @inheirtDoc
     */
    public function load($products, $id)
    {
        $this->resource->load($products, $id);
        return $products;
    }

    /**
     * @inheirtDoc
     */
    public function getById($id)
    {
        $products = $this->modelFactory->create();
        $this->resource->load($products, $id);
        return $products;
    }


    /**
     * @inheritDoc
     */
    public function getList(): array
    {
        return $this->collectionFactory->create()->getItems();
    }
}
