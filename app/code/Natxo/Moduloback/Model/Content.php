<?php
namespace Natxo\Moduloback\Model;
class Content extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'natxo_moduloback';

	protected $_cacheTag = 'natxo_moduloback';

	protected $_eventPrefix = 'natxo_moduloback';

	protected function _construct()
	{
		$this->_init('Natxo\Moduloback\Model\ResourceModel\Content');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}