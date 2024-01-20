<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ForNoKeyUpdate
{

  protected bool $for_no_key_update = false;
  protected array $for_no_key_update_of = [];
  protected string $for_no_key_update_suffix = '';

  public function forNoKeyUpdate(string|array $table = []): static
  {

    $this->for_no_key_update = true;

    foreach ((array) $table as $t)
    {
      $this->for_no_key_update_of[] = $t;
    }

    return $this;

  }

  public function forNoKeyUpdateNoWait(string|array $table = []): static
  {

    $this->for_no_key_update_suffix = 'NOWAIT';

    return $this->forNoKeyUpdate($table);

  }

  public function forNoKeyUpdateSkipLocked(string|array $table = []): static
  {

    $this->for_no_key_update_suffix = 'SKIP LOCKED';

    return $this->forNoKeyUpdate($table);

  }

  protected function getForNoKeyUpdateOf(): string
  {

    if (empty($this->for_no_key_update_of))
    {
      return '';
    }

    $table = implode(', ', $this->for_no_key_update_of);

    return "OF $table";

  }

  protected function getForNoKeyUpdate(): string
  {

    if (!$this->for_no_key_update)
    {
      return '';
    }

    return implode(' ', array_filter([
      'FOR NO KEY UPDATE',
      $this->getForNoKeyUpdateOf(),
      $this->for_no_key_update_suffix,
    ]));

  }

}