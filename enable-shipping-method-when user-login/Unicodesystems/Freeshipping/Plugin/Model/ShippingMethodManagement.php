<?php
namespace Unicodesystems\Freeshipping\Plugin\Model;
 
class ShippingMethodManagement {
    public function __construct(
        \Magento\Customer\Model\Session $customerSession
    ) {
        $this->customerSession = $customerSession;
    }
 
    public function afterEstimateByExtendedAddress($shippingMethodManagement, $output)
    {
        return $this->filterOutput($output);
    }
    private function filterOutput($output)
    {
        $methods = [];
        foreach ($output as $shippingMethod) {
            if (!$this->customerSession->isLoggedIn() && $shippingMethod->getCarrierCode() == 'freeshipping' && $shippingMethod->getMethodCode() == 'freeshipping') {
                    continue;
            } else {
                $methods[] = $shippingMethod;            
            }
        }
        if ($methods) {
            return $methods;
        }
        return $output;
    }
}
