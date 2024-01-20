<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ForKeyShare
{

  protected bool $for_key_share = false;
  protected array $for_key_share_of = [];
  protected string $for_key_share_suffix = '';

  public function forKeyShare(string|array $table = []): static
  {

    $this->for_key_share = true;

    foreach ((array) $table as $t)
    {
      $this->for_key_share_of[] = $t;
    }

    return $this;

  }

  public function forKeyShareNoWait(string|array $table = []): static
  {

    $this->for_key_share_suffix = 'NOWAIT';

    return $this->forKeyShare($table);

  }

  public function forKeyShareSkipLocked(string|array $table = []): static
  {

    $this->for_key_share_suffix = 'SKIP LOCKED';

    return $this->forKeyShare($table);

  }

  protected function getForKeyShareOf(): string
  {

    if (empty($this->for_key_share_of))
    {
      return '';
    }

    $table = implode(', ', $this->for_key_share_of);

    return "OF $table";

  }

  protected function getForKeyShare(): string
  {

    if (!$this->for_key_share)
    {
      return '';
    }

    return implode(' ', array_filter([
      'FOR KEY SHARE',
      $this->getForKeyShareOf(),
      $this->for_key_share_suffix,
    ]));

  }

}