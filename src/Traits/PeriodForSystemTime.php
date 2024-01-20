<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait PeriodForSystemTime
{

  protected string $period_for_system_time = '';

  public function periodForSystemTime(string $start, string $end): static
  {

    $this->period_for_system_time = "PERIOD FOR SYSTEM_TIME ($start, $end)";

    return $this;

  }

  protected function getPeriodForSystemTime(): string
  {
    return $this->period_for_system_time;
  }

}