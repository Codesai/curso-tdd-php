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

        if (
            $psiPressureValue < self::LOW_PRESSURE_THRESHOLD || $psiPressureValue > self::HIGH_PRESSURE_THRESHOLD
        ) {
            if(!$this->isAlarmOn()) {
                $this->isAlarmOn = true;
                print_r('Alarm activated');
            }
        }else{
            if($this->isAlarmOn()){
                $this->isAlarmOn = false;
                print_r('Alarm deactivated');
            }
        }
    }

    private function isAlarmOn(): bool
    {
        return $this->isAlarmOn;
    }
}
