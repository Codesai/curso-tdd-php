<?php

namespace Codesai\TDD\ProblematicDiscount;

use DateTime;

class MarketingCampaign
{
    public function isActive(): bool {
        return (time() % 2) === 0;
    }

    public function isCrazySalesDay(): bool {
        return (new DateTime())->format('N') === '5';
    }
}