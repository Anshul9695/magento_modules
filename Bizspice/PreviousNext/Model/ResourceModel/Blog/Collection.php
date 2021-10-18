<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bizspice\PreviousNext\Model\ResourceModel\Blog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection{
    protected function _construct()
    {
        $this->_init('Bizspice\PreviousNext\Model\Blog', 'Bizspice\PreviousNext\Model\ResourceModel\Blog');
    }
}