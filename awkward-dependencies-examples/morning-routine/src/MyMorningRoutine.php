<?php

namespace Codesai\TDD\CourseDuration;

class MyMorningRoutine
{
    public function WhatShouldIDoNow()
    {
        $now = new \DateTime();
        $currentHour = (int)$now->format('H');

        if ($currentHour == 6) {
            echo "Do exercise\n";
        } elseif ($currentHour == 7) {
            echo "Read and study\n";
        } elseif ($currentHour == 8) {
            echo "Have breakfast\n";
        } else {
            echo "No activity\n";
        }
    }
}
