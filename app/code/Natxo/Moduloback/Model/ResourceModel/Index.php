<?php
/**
 * Copyright © 2015 Natxo. All rights reserved.
 */
namespace Natxo\Moduloback\Model\ResourceModel;

/**
 * Index resource
 */
class Index extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('moduloback_index', 'id');
    }

  
}
