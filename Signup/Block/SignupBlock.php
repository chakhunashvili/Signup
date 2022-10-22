<?php

namespace Devall\Signup\Block;

use Devall\Signup\Api\SignupRepositoryInterface;
use Devall\Signup\Model\ResourceModel\Signup\Collection;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class SignupBlock extends Template
{

    /**
     * @var SignupRepositoryInterface
     */
    private SignupRepositoryInterface $signupRepository;

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
     * @param SignupRepositoryInterface $signupRepository
     * @param ScopeConfigInterface $scopeConfig
     * @param Collection $collection
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        SignupRepositoryInterface $signupRepository,
        ScopeConfigInterface $scopeConfig,
        Collection $collection,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $data
        );
        $this->scopeConfig = $scopeConfig;
        $this->signupRepository = $signupRepository;
        $this->collection = $collection;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return (bool)$this->scopeConfig->getValue('signup/general/enable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        ;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getSignById($id) {
        return $this->signupRepository->getById($id);
    }

    public function getAllSign() {
        return $this->collection->getItems();
    }

    /**
     * @param $signup
     * @return mixed
     */
    public function saveSign($signup) {
        return $this->signupRepository->save($signup);
    }
}
