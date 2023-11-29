<?php

namespace Codesai\TDD\CourseDuration;

use DateTime;

class Course
{
    private string $name;
    private DateTime $startTime;
    public int $durationInMinutes;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->durationInMinutes = 0;
    }

    public function start(): void
    {
        $this->startTime = new \DateTime();
    }

    public function end(): void
    {
        $endTime = new \DateTime();
        $this->durationInMinutes =  ($endTime->getTimestamp() - $this->startTime->getTimestamp()) / 60;
    }

    public function isShort(): bool
    {
        $tenMinutes = 10 * 60;
        return $this->durationInMinutes < $tenMinutes;
    }

    public function isLong(): bool
    {
        return !$this->isShort();
    }

    public function getTitle(): string
    {
        return "{$this->name} course in {$this->getCollege()} college";
    }

    private function getCollege(): string
    {
        return getenv('COLLEGE') ? getenv('COLLEGE') : "NOT_FOUND";
    }
}