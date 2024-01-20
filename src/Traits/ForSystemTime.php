<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait ForSystemTime
{

  protected array $for_system_time = [];

  public function forSystemTimeAsOf(string|int|HasBindings $time): static
  {

    $this->for_system_time = ['AS OF', $time];

    return $this;

  }

  public function forSystemTimeBetween(
    string|int|HasBindings $from,
    string|int|HasBindings $to
  ): static
  {

    $this->for_system_time = ['BETWEEN', $from, 'AND', $to];

    return $this;

  }

  public function forSystemTimeFrom(
    string|int|HasBindings $from,
    string|int|HasBindings $to
  ): static
  {

    $this->for_system_time = ['FROM', $from, 'TO', $to];

    return $this;

  }

  public function forSystemTimeAll(): static
  {

    $this->for_system_time = ['ALL'];

    return $this;

  }

  protected function getForSystemTime(): string
  {

    if (empty($this->for_system_time))
    {
      return '';
    }

    $for_system_time = implode(' ', $this->for_system_time);

    foreach ($this->for_system_time as $part)
    {

      if ($part instanceof HasBindings)
      {
        $this->mergeBindings($part);
      }

    }

    return "FOR SYSTEM_TIME $for_system_time";

  }

}