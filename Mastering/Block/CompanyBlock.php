<?php

namespace Devall\Mastering\Block;

use Magento\Framework\View\Element\Template;
use Devall\Mastering\Api\CompanyRepositoryInterface;

class CompanyBlock extends Template
{
    public function __construct(
        Template\Context $context,
        CompanyRepositoryInterface $companyRepository,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $data
        );
        $this->companyRepository = $companyRepository;
    }

    public function getCompany($id) {
        return $this->companyRepository->getById($id);
    }

    public function saveCompany($company) {
        return $this->companyRepository->save($company);
    }
}
