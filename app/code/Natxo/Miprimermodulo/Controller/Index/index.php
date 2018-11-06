<?php 
namespace Natxo\Miprimermodulo\Controller\Index;
 
class Index extends \Natxo\Miprimermodulo\Controller\Index
{
    /**
     * Show Sample Module main page
     *
     * @return void
     */
    public function execute()
    {
echo "hola";
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
