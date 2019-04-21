<?php

namespace Kounta\Modules;

use Kounta\Constants\Days;

class WeekIterator
{
  private $week = [
    Days::SUNDAY,
    Days::MONDAY,
    Days::TUESDAY,
    Days::WEDNESDAY,
    Days::THURSDAY,
    Days::FRIDAY,
    Days::SATURDAY
  ];

  private $passedDays = 0;

  public function __construct (int $dayId = Days::SUNDAY)
  {
    $this->setIterationPoint($dayId);
  }

  public function iterateWeek (\Closure $actvity, $dayCountLimit = 0): void
  {
    while ($this->passedDays !== $dayCountLimit)
    {
      $activity(current($this->week), $this->passedDays);

      $this->passedDays++;
      $this->moveNextDay();
    }
  }

  private function moveNextDay ()
  {
    if (current($this->week) === 6)
    {
      reset($this->week);
    }
    else
    {
      next($this->week);
    }
  }

  private function setIterationPoint (int $startPoint): void
  {
    $stopIteration = false;
    while (!$stopIteration)
    {
      if ($startPoint === current($this->week))
      {
        $stopIteration = true;
      }
      else
      {
        next($this->week);
      }
    }
  }
}
