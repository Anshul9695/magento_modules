<?php


namespace Jc\SuperHero\Model\ResourceModel\Hero;


use Jc\SuperHero\Model\Hero;
use Jc\SuperHero\Model\ResourceModel\Hero as HeroResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Hero::class, HeroResourceModel::class);
    }
}
