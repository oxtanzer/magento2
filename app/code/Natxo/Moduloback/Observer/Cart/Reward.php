<?php
 
namespace Natxo\Moduloback\Observer\Cart;
 
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\View\LayoutFactory;
 
class Reward implements ObserverInterface
{

    protected $layout;

    public function __construct(\Magento\Framework\View\LayoutInterface $layout)
    {
        $this->layout = $layout;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        //$this->logger->debug($observer->getDataObject()->getData());

        $product = $observer->getEvent()->getProduct();
        $quoteitem = $observer->getEvent()->getQuoteItem();

        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/moduloback.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);

        $logger->info($quoteitem->getId().' - '.$product->getName());

        $block = $this->layout->createBlock('Natxo\Moduloback\Block\Reward')
                        ->setTemplate('Natxo_Moduloback::reward/rewardPopup.phtml')
                        ->setResponse($product->getName())
                        ->toHtml();
        //$logger->info(var_dump($block));
        return $block;
return; 
        /*
        //Como cambiar precio del producto que se acaba de añadir al carrito
        
            $item = $observer->getEvent()->getData('quote_item');         
            $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
            $price = 100; //set your price here
            $item->setCustomPrice($price);
            $item->setOriginalCustomPrice($price);
            $item->getProduct()->setIsSuperMode(true);
        
        //Fin
         */

        /*
        //Como cambiar el nombre 
        $product = $observer->getProduct();
 
        $originalName = $product->getName();
 
        $modifiedName = $originalName . ' - MODIFICADO POR EL OBSERVER';
 
        $product->setName($modifiedName);*/
    }
 
}