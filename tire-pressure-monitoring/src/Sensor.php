<?php

namespace Codesai\TDD\TirePressureMonitoring;

class Sensor
{
    private const OFFSET = 16;

    public function popNextPressurePsiValue()
    {
        $pressureTelemetryValue = self::getSamplePressure();

        return self::OFFSET + $pressureTelemetryValue;
    }

    private static function getSamplePressure()
    {
        return 6 * mt_rand() / mt_getrandmax() * mt_rand() / mt_getrandmax();
    }
}