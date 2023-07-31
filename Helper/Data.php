<?php
declare(strict_types=1);

namespace Training\CurrencyPrice\Helper;

use Magento\Store\Model\ScopeInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    public function isActive():bool
    {
        return (bool) $this->scopeConfig->isSetFlag(
            'training_currency_price/module/enabled',
            ScopeInterface::SCOPE_STORE,
        );
    }

}
