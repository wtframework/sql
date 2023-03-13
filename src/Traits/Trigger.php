<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Trigger
{

  protected array $trigger = [];

  public function enableTrigger(string|array $trigger): static
  {

    foreach ((array) $trigger as $t)
    {
      $this->trigger[] = "ENABLE TRIGGER $t";
    }

    return $this;

  }

  public function disableTrigger(string|array $trigger): static
  {

    foreach ((array) $trigger as $t)
    {
      $this->trigger[] = "DISABLE TRIGGER $t";
    }

    return $this;

  }

  public function enableReplicaTrigger(string|array $trigger): static
  {

    foreach ((array) $trigger as $t)
    {
      $this->trigger[] = "ENABLE REPLICA TRIGGER $t";
    }

    return $this;

  }

  public function enableAlwaysTrigger(string|array $trigger): static
  {

    foreach ((array) $trigger as $t)
    {
      $this->trigger[] = "ENABLE ALWAYS TRIGGER $t";
    }

    return $this;

  }

  protected function getTrigger(): string
  {
    return implode(', ', $this->trigger);
  }

}