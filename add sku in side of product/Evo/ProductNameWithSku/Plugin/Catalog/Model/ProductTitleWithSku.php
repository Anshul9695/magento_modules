<?php

namespace Evo\ProductNameWithSku\Plugin\Catalog\Model;

class ProductTitleWithSku
{
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {
        //$title = $subject->getSku()." - "."sku:".$result;
        $title = $result.":sku"." - ".$subject->getSku();
        return $title;
    }
}