<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait ForPortionOf
{

  protected string $for_portion_of = '';
  protected mixed $for_portion_of_from = null;
  protected mixed $for_portion_of_to = null;

  public function forPortionOf(
    string $period,
    mixed $date_from,
    mixed $date_to
  ): static
  {

    $this->for_portion_of = $period;
    $this->for_portion_of_from = $date_from;
    $this->for_portion_of_to = $date_to;

    return $this;

  }

  protected function getForPortionOf(): string
  {

    if ('' === $this->for_portion_of)
    {
      return '';
    }

    $date_from = (string) $this->for_portion_of_from;

    if ($this->for_portion_of_from instanceof HasBindings)
    {
      $this->mergeBindings(from: $this->for_portion_of_from);
    }

    else
    {

      $date_from = '?';

      $this->bind($this->for_portion_of_from);

    }

    $date_to = (string) $this->for_portion_of_to;

    if ($this->for_portion_of_to instanceof HasBindings)
    {
      $this->mergeBindings(from: $this->for_portion_of_to);
    }

    else
    {

      $date_to = '?';

      $this->bind($this->for_portion_of_to);

    }

    return "FOR PORTION OF $this->for_portion_of FROM $date_from TO $date_to";

  }

}