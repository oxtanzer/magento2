<?php
namespace Natxo\Miprimermodulo\Controller; 
 
use Magento\Framework\App\RequestInterface;
 
/**
 * SampleModule index controller
 */
abstract class Index extends \Magento\Framework\App\Action\Action
{
 
    /**
     * @var \Magento\Framework\Translate\Inline\StateInterface
     */
    protected $inlineTranslation;
 
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;
 
    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        parent::__construct($context);
        $this->inlineTranslation = $inlineTranslation;
        $this->scopeConfig = $scopeConfig;
    }
 
    /**
     * Dispatch request
     *
     * @param RequestInterface $request
     * @return \Magento\Framework\App\ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function dispatch(RequestInterface $request)
    {
        return parent::dispatch($request);
    }
}
