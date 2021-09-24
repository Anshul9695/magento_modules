<?php


namespace Jc\SuperHero\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Hero extends AbstractDb
{
    const MAIN_TABLE = 'customer_enquiry_data';
    const ID_FIELD_NAME = 'id';

    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
