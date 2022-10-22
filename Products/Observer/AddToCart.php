<?php
namespace Devall\Products\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AddToCart implements ObserverInterface
{


    public function execute(Observer $observer)
    {
        echo "Hello World";
    }
}
