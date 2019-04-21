<?php

use PHPUnit\Framework\TestCase;

use Kounta\Modules\WeekIterator;
use Kounta\Constants\Days;

class WeekIterationTest extends TestCase
{
  public function testShouldRunIteratorFor4DaysAndResultDayShouldBeWednesday ()
  {
    $iterator  = new WeekIterator();
    $resultDay = 0;

    $iterator->iterateWeek( function ($currentDay) use (&$resultDay) {
      $resultDay = $currentDay;
    }, 4);

    $this->assertEquals(Days::WEDNESDAY, $resultDay);
  }

  public function testShouldRunIteratorFor10DaysAndResultDayShouldBeTuesday ()
  {
    $iterator  = new WeekIterator();
    $resultDay = 0;

    $iterator->iterateWeek( function ($currentDay) use (&$resultDay) {
      $resultDay = $currentDay;
    }, 10);

    $this->assertEquals(Days::TUESDAY, $resultDay);
  }

  public function testShouldRunIteratorFromTuedayFor5DaysAndResultDayShouldBeSaturday ()
  {
    $iterator  = new WeekIterator(Days::TUESDAY);
    $resultDay = 0;

    $iterator->iterateWeek( function ($currentDay) use (&$resultDay) {
      $resultDay = $currentDay;
    }, 5);

    $this->assertEquals(Days::SATURDAY, $resultDay);
  }
}
