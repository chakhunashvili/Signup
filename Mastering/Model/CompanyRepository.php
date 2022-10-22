<?php

namespace Devall\Mastering\Model;

use Devall\Mastering\Api\CompanyRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function __construct(
        \Devall\Mastering\Model\ResourceModel\CompanyResourceModel $resource,
        \Devall\Mastering\Model\CompanyModelFactory $modelFactory
    ) {
        $this->resource = $resource;
        $this->modelFactory = $modelFactory;
    }

    /**
     * @inheirtDoc
     */
    public function save($company)
    {
        $this->resource->save($company);
        return $company;
    }

    /**
     * @inheirtDoc
     */
    public function load($company, $id)
    {
        $this->resource->load($company, $id);
        return $company;
    }

    /**
     * @inheirtDoc
     */
    public function getById($id)
    {
        $company = $this->modelFactory->create();
        $this->resource->load($company, $id);
        return $company;
    }
}
