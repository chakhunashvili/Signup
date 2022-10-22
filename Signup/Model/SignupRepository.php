<?php

namespace Devall\Signup\Model;

use Devall\Signup\Api\SignupRepositoryInterface;
use Devall\Signup\Model\ResourceModel\Signup\Collection;
use Devall\Signup\Model\ResourceModel\Signup\CollectionFactory;
use Devall\Signup\Model\ResourceModel\SignupResourceModel;

class SignupRepository implements SignupRepositoryInterface
{
    public function __construct(
        SignupResourceModel $resource,
        SignupFactory     $modelFactory,
        CollectionFactory   $collectionFactory
    ) {
        $this->resource = $resource;
        $this->modelFactory = $modelFactory;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @inheirtDoc
     */
    public function save($signup)
    {
        $this->resource->save($signup);
        return $signup;
    }

    /**
     * @inheirtDoc
     */
    public function load($signup, $id)
    {
        $this->resource->load($signup, $id);
        return $signup;
    }

    /**
     * @inheirtDoc
     */
    public function getById($id)
    {
        $signup = $this->modelFactory->create();
        $this->resource->load($signup, $id);
        return $signup;
    }


    /**
     * @inheritDoc
     */
    public function getList(): array
    {
        return $this->collectionFactory->create()->getItems();
    }
}
