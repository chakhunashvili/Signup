<?php

namespace Devall\Products\Api;

interface ProductsRepositoryInterface
{
    /**
     * @param $product
     * @return mixed
     */
    public function save($product);

    /**
     * @param $product
     * @param $id
     * @return mixed
     */
    public function load($product, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * @return \Devall\Products\Api\Data\ProductsInterface[]
     */
    public function getList();
}
