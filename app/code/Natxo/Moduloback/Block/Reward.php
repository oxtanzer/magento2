<?php


namespace Natxo\Moduloback\Block;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Reward extends Template implements BlockInterface
{
    
    // Contructor de Description (1ro)
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Registry $registry
    )
    {    
        parent::__construct($context);
        $this->_storeManager = $storeManager;
        $this->_registry = $registry;
        $this->setData('reward_popup', $this->getRewardRegistry());
    }

    // Contructor de la functiones (2do)
    protected function _construct()
    {
        parent::_construct();
        //$this->setTemplate('widget/sliderimages.phtml');
    }
    
    private function getRewardRegistry() {
        $rewardInfo = $this->_registry->registry('reward_popup');
    }
}