<?php


namespace Natxo\Moduloback\Block;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Reward extends Template implements BlockInterface
{
    
    // Contructor de Description (1ro)
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    )
    {    
        $this->_storeManager = $storeManager;
        parent::__construct($context);
    }

    // Contructor de la functiones (2do)
    protected function _construct()
    {
        parent::_construct();
        //$this->setTemplate('widget/sliderimages.phtml');
    }    
}