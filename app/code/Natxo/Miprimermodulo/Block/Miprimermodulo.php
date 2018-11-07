<?php
namespace Natxo\Miprimermodulo\Block;
class Miprimermodulo extends \Magento\Framework\View\Element\Template
{    
    protected $_categoryFactory;
    protected $_imageBuilder;
        
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Catalog\Block\Product\ImageBuilder $_imageBuilder
    )
    {    
        parent::__construct($context);
        $this->_categoryFactory = $categoryFactory;
        $this->_imageBuilder=$_imageBuilder;
    }
    
    public function getCategory($categoryId)
    {
        $category = $this->_categoryFactory->create();
        $category->load($categoryId);
        return $category;
    }

    public function getCategoryProducts($categoryId)
    {

        $products = $this->getCategory($categoryId)->getProductCollection()->setPageSize(3)->setCurPage(1);
        $products->addAttributeToSelect('*');
        return $products;
    }

    public function getImage($product, $imageId, $attributes = [])
    {
        return $this->_imageBuilder->setProduct($product)
            ->setImageId($imageId)
            ->setAttributes($attributes)
            ->create();
    }
}
?>
