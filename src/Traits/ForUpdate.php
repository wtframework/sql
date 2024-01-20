<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ForUpdate
{

  protected bool $for_update = false;
  protected array $for_update_of = [];
  protected string $for_update_suffix = '';

  public function forUpdate(string|array $table = []): static
  {

    $this->for_update = true;

    foreach ((array) $table as $t)
    {
      $this->for_update_of[] = $t;
    }

    return $this;

  }

  public function forUpdateWait(int $seconds): static
  {

    $this->for_update_suffix = "WAIT $seconds";

    return $this->forUpdate();

  }

  public function forUpdateNoWait(string|array $table = []): static
  {

    $this->for_update_suffix = 'NOWAIT';

    return $this->forUpdate($table);

  }

  public function forUpdateSkipLocked(string|array $table = []): static
  {

    $this->for_update_suffix = 'SKIP LOCKED';

    return $this->forUpdate($table);

  }

  protected function getForUpdateOf(): string
  {

    if (empty($this->for_update_of))
    {
      return '';
    }

    $table = implode(', ', $this->for_update_of);

    return "OF $table";

  }

  protected function getForUpdate(): string
  {

    if (!$this->for_update)
    {
      return '';
    }

    return implode(' ', array_filter([
      'FOR UPDATE',
      $this->getForUpdateOf(),
      $this->for_update_suffix,
    ]));

  }

}