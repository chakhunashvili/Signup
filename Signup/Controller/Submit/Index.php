<?php

namespace Devall\Signup\Controller\Submit;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Request\InvalidRequestException;
use Devall\Signup\Model\SignupRepository;
use Devall\Signup\Model\SignupFactory;

class Index extends Action implements CsrfAwareActionInterface
{
    public function __construct(Context $context, SignupRepository $signupRepository, SignupFactory $signupFactory)
    {
        parent::__construct($context);
        $this->signupRepository = $signupRepository;
        $this->signupFactory = $signupFactory;
    }

    /**
     * Execute action based on request and return result
     *
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */
    public function execute()
    {
        $name = $_REQUEST["name"];
        $date = $_REQUEST["date"];
        $newuser=$this->signupFactory->create();
        $newuser->setName($name);
        $newuser->setDate($date);
        $this->signupRepository->save($newuser);
    }

    public function createCsrfValidationException(RequestInterface $request): ?InvalidRequestException
    {
        return null;
    }

    public function validateForCsrf(RequestInterface $request): ?bool
    {
        return true;
    }

}
