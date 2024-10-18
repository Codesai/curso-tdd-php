<?php

namespace Codesai\TDD\ProblematicDiscount;

class Discount
{
    private MarketingCampaign $marketingCampaign;

    public function __construct() {
        $this->marketingCampaign = new MarketingCampaign();
    }

    public function discountFor(Money $netPrice): Money {
        if ($this->marketingCampaign->isCrazySalesDay()) {
            return $netPrice->reduceBy(15);
        }
        if ($netPrice->moreThan(Money::oneThousand())) {
            return $netPrice->reduceBy(10);
        }
        if ($netPrice->moreThan(Money::oneHundred()) && $this->marketingCampaign->isActive()) {
            return $netPrice->reduceBy(5);
        }

        return $netPrice;
    }
}
