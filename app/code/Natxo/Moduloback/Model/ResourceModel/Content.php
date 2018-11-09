<?php
namespace Natxo\Moduloback\Model\ResourceModel;


class Content extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('natxo_moduloback', 'id');
	}
	
}