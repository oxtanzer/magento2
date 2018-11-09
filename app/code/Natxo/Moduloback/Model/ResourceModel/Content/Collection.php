<?php
namespace Natxo\Moduloback\Model\ResourceModel\Content;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'natxo_moduloback_collection';
	protected $_eventObject = 'natxo_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Natxo\Moduloback\Model\Content', 'Natxo\Moduloback\Model\ResourceModel\Content');
	}

}