<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Rule
{

  protected array $rule = [];

  public function enableRule(string|array $rule): static
  {

    foreach ((array) $rule as $r)
    {
      $this->rule[] = "ENABLE RULE $r";
    }

    return $this;

  }

  public function disableRule(string|array $rule): static
  {

    foreach ((array) $rule as $r)
    {
      $this->rule[] = "DISABLE RULE $r";
    }

    return $this;

  }

  public function enableReplicaRule(string|array $rule): static
  {

    foreach ((array) $rule as $r)
    {
      $this->rule[] = "ENABLE REPLICA RULE $r";
    }

    return $this;

  }

  public function enableAlwaysRule(string|array $rule): static
  {

    foreach ((array) $rule as $r)
    {
      $this->rule[] = "ENABLE ALWAYS RULE $r";
    }

    return $this;

  }

  protected function getRule(): string
  {
    return implode(', ', $this->rule);
  }

}