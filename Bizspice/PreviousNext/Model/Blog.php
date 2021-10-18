<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bizspice\PreviousNext\Model;
use Magento\Framework\Model\AbstractModel;

class Blog extends \Magento\Framework\Model\AbstractModel {

    protected function _construct() {
        $this->_init('Bizspice\PreviousNext\Model\ResourceModel\Blog');
    }
}