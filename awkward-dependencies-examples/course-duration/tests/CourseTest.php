<?php

namespace tests;

use Codesai\TDD\CourseDuration\Course;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class CourseTest extends TestCase
{
    private $course;

    protected function setUp(): void
    {
        $this->course = new Course("macramé");
    }

    #[Test]
    public function identifies_short_courses() {
        $this->course->start();
        $this->course->end();

        self::assertTrue($this->course->isShort());
    }

    #[Test]
    public function identifies_long_courses() {
        self::markTestIncomplete("TODO");
    }

    #[Test]
    public function knows_the_course_title() {
        self::markTestIncomplete("TODO");
    }
}