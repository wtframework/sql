<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use Closure;
use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Services\Predicate;
use WTFramework\SQL\Services\Raw;

trait IfElse
{

  protected ?Predicate $if = null;
  protected string|HasBindings|null $else = null;

  public function if(
    string|int|float|HasBindings|Closure|array $value1 = null,
    string|int|float|array|HasBindings $operator = null,
    string|int|float|array|HasBindings $value2 = null
  ): static
  {

    $this->if = new Predicate(
      column: Predicate::convertSelectToSubquery($value1),
      operator: is_string($operator) && 2 == func_num_args()
        ? new Raw($operator)
        : Predicate::convertSelectToSubquery($operator),
      value: is_string($value2)
        ? new Raw($value2)
        : Predicate::convertSelectToSubquery($value2),
      num_args: func_num_args()
    );;

    return $this;

  }

  public function else(string|HasBindings $stmt): static
  {

    $this->else = $stmt;

    return $this;

  }

  protected function getIf(): string
  {

    if (null === $this->if)
    {
      return '';
    }

    $if = (string) $this->if;

    if ($this->if instanceof HasBindings)
    {
      $this->mergeBindings($this->if);
    }

    return "IF $if";

  }

  protected function getElse(): string
  {

    if (null === $this->if || null === $this->else)
    {
      return '';
    }

    $else = (string) $this->else;

    if ($this->else instanceof HasBindings)
    {
      $this->mergeBindings($this->else);
    }

    return "ELSE $else";

  }

}