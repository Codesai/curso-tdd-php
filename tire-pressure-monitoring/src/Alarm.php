<?php

namespace Codesai\TDD\TirePressureMonitoring;

class Alarm
{
    private const LOW_PRESSURE_THRESHOLD = 17;
    private const HIGH_PRESSURE_THRESHOLD = 21;

    private $sensor;
    private $isAlarmOn;

    public function __construct()
    {
        $this->isAlarmOn = false;
        $this->sensor = new Sensor();
    }

    public function check(): void
    {
        $psiPressureValue = $this->sensor->popNextPressurePsiValue();

        if ($psiPressureValue < self::LOW_PRESSURE_THRESHOLD || $psiPressureValue > self::HIGH_PRESSURE_THRESHOLD) {
            if(!$this->isAlarmOn) {
               $this->isAlarmOn = true;
               var_dump("Alarm activated!");
            }
        } else {
            if($this->isAlarmOn) {
               $this->isAlarmOn = false;
               var_dump("Alarm deactivated!");
            }
        }
    }
}
