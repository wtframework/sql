<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\SQL;

trait BeforeSystemTime
{

  protected ?HasBindings $before_system_time = null;

  public function beforeSystemTime(string|HasBindings $time): static
  {

    if (is_string($time))
    {
      $time = SQL::bind($time);
    }

    $this->before_system_time = $time;

    return $this;

  }

  protected function getBeforeSystemTime(): string
  {

    if (empty($this->before_system_time))
    {
      return '';
    }

    $time = (string) $this->before_system_time;

    if ($this->before_system_time instanceof HasBindings)
    {
      $this->mergeBindings($this->before_system_time);
    }

    return "BEFORE SYSTEM_TIME $time";

  }

}