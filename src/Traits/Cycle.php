<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Cycle
{

  protected array $cycle = [];
  protected string $cycle_set = '';
  protected string|int $to = '';
  protected string|int $default = '';
  protected string $using = '';

  public function cycle(string|array $column): static
  {

    foreach ((array) $column as $c)
    {
      $this->cycle[] = $c;
    }

    return $this;

  }

  public function set(string $column): static
  {

    $this->cycle_set = "SET $column";

    return $this;

  }

  public function to(string|int $value): static
  {

    $this->to = "TO $value";

    return $this;

  }

  public function default(string|int $value): static
  {

    $this->default = "DEFAULT $value";

    return $this;

  }

  public function using(string $column): static
  {

    $this->using = "USING $column";

    return $this;

  }

  protected function getCycle(): string
  {

    if (empty($this->cycle))
    {
      return '';
    }

    $cycle = implode(', ', $this->cycle);

    return implode(' ', array_filter([
      "CYCLE $cycle",
      $this->cycle_set,
      $this->to,
      $this->default,
      $this->using,
    ]));

  }

}