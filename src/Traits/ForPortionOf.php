<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait ForPortionOf
{

  protected array $for_portion_of = [];

  public function forPortionOf(
    string $period,
    string|int|float|HasBindings $from,
    string|int|float|HasBindings $to
  ): static
  {

    $this->for_portion_of = [$period, 'FROM', $from, 'TO', $to];

    return $this;

  }

  protected function getForPortionOf(): string
  {

    if (empty($this->for_portion_of))
    {
      return '';
    }

    $for_portion_of = implode(' ', $this->for_portion_of);

    foreach ($this->for_portion_of as $part)
    {

      if ($part instanceof HasBindings)
      {
        $this->mergeBindings($part);
      }

    }

    return "FOR PORTION OF $for_portion_of";

  }

}