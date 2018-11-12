<?php
namespace Natxo\Moduloback\Block\Adminhtml;
class Index extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
		
        $this->_controller = 'adminhtml_index';/*block grid.php directory*/
        $this->_blockGroup = 'Natxo_Moduloback';
        $this->_headerText = __('Index');
        $this->_addButtonLabel = __('Add New Entry'); 
        parent::_construct();
		
    }
}
