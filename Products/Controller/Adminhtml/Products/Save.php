<?php

namespace Devall\Products\Controller\Adminhtml\Products;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;

class Save extends Action implements HttpPostActionInterface
{
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Devall\Products\Model\ProductsFactory $productsFactory,
        \Devall\Products\Api\ProductsRepositoryInterface $productsRepository
    ) {
        parent::__construct($context);
        $this->productsFactory = $productsFactory;
        $this->productsRepository = $productsRepository;
    }

    /**
     * Authorization level of a basic admin session
     */
    const ADMIN_RESOURCE = 'Devall_Products::manage';

    /**
     * Execute action based on request and return result
     *
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */
    public function execute()
    {
        $data = $_REQUEST['general'];
        $product = $this->productsFactory->create();
        $product->setData($data);
        $this->productsRepository->save($product);
        //dispatch event
        $textDisplay = new \Magento\Framework\DataObject(array('text' => 'Save Products'));
        $this->_eventManager->dispatch('save_product_after', ['mp_text' => $textDisplay]);

        return $this->resultRedirectFactory->create()->setPath("devall/products/grid");
    }
}
