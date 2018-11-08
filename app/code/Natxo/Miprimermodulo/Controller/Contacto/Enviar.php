<?php

namespace Natxo\Miprimermodulo\Controller\Contacto;

//use Magento\Framework\App\RequestInterface;

class Enviar extends \Magento\Framework\App\Action\Action
{

    protected $resultPageFactory;
    protected $jsonHelper;
    protected $_request;
    //protected $_transportBuilder;
    protected $_storeManager;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Action\Context  $context
     * @param \Magento\Framework\Json\Helper\Data $jsonHelper
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\App\Request\Http $request,
        //\Magento\Framework\Mail\Template\TransportBuilder $transportBuilder,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Json\Helper\Data $jsonHelper,
        array $data = []
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->jsonHelper = $jsonHelper;
        $this->_request = $request;
        //$this->_transportBuilder = $transportBuilder;
        $this->_storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try {
            //$test = array('status' => 'success', 'message' => 'Agregado' );
            $post = (array) $this->getRequest()->getPost();

            if (!empty($post)) {
                // Retrieve your form data
                $form_contacto_datos = array();
                $form_contacto_datos['firstname']   = $post['firstname'];
                $form_contacto_datos['lastname']    = $post['lastname'];
                $form_contacto_datos['phone']       = $post['phone'];
                $form_contacto_datos['email']       = $post['email'];
                $form_contacto_datos['fecha'] = $post['fecha'];

                // Display the succes form validation message
                $this->messageManager->addSuccessMessage('Email enviado');

            }

            $store = $this->_storeManager->getStore()->getId();

            $transport = $this->_transportBuilder->setTemplateIdentifier('miprimermodulo_test_template')
                ->setTemplateOptions(['area' => 'frontend', 'store' => $store])
                ->setTemplateVars(
                    [
                        'store' => $this->_storeManager->getStore(),
                    ]
                )
                ->setFrom('general')
                // you can config general email address in Store -> Configuration -> General -> Store Email Addresses
                ->addTo($form_contacto_datos['email'], 'Nombre Cliente')
                ->getTransport();
            $transport->sendMessage();

        return $this->jsonResponse($form_contacto_datos);
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            return $this->jsonResponse($e->getMessage());
        } catch (\Exception $e) {
            $this->logger->critical($e);
            return $this->jsonResponse($e->getMessage());
        }
    }

    /**
     * Create json response
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function jsonResponse($response = '')
    {
        return $this->getResponse()->representJson(
            $this->jsonHelper->jsonEncode($response)
        );
    }
}
