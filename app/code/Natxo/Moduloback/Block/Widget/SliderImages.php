<?php


namespace Natxo\Moduloback\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class SliderImages extends Template implements BlockInterface
{
    protected $_storeManager;
    protected $_banners;
    
    // Contructor de Description (1ro)
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Natxo\Moduloback\Model\ResourceModel\Index\Collection $banners
    )
    {    
        $this->_storeManager = $storeManager;
        $this->_banners = $banners;
        parent::__construct($context);
    }

    // Contructor de la functiones (2do)
    protected function _construct()
    {
        parent::_construct();

        // $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        
        // $productCollection = $objectBanners->create();

        // $collection = $productCollection->load();

        $this->setData('products', $this->getBannerList()); 
        $this->setTemplate('widget/sliderimages.phtml');
    }    

    private function getBannerList() {
        $banners = $this->_banners->load();
        return $banners->getData();
    }
}