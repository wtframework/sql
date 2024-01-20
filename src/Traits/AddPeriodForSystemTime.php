<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait AddPeriodForSystemTime
{

  protected string $add_period_for_system_time = '';

  public function addPeriodForSystemTime(string $start, string $end): static
  {

    $this->add_period_for_system_time
      = "ADD PERIOD FOR SYSTEM_TIME ($start, $end)";

    return $this;

  }

  protected function getAddPeriodForSystemTime(): string
  {
    return $this->add_period_for_system_time;
  }

}