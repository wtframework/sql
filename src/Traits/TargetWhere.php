<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait TargetWhere
{

  protected string|HasBindings $target_where = '';

  public function targetWhere(string|HasBindings $condition): static
  {

    $this->target_where = $condition;

    return $this;

  }

  protected function getTargetWhere(): string
  {

    if ('' === $this->target_where)
    {
      return '';
    }

    $target_where = (string) $this->target_where;

    if ($this->target_where instanceof HasBindings)
    {
      $this->mergeBindings(from: $this->target_where);
    }

    return "WHERE $target_where";

  }

}