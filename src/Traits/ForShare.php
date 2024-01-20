<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ForShare
{

  protected bool $for_share = false;
  protected array $for_share_of = [];
  protected string $for_share_suffix = '';

  public function forShare(string|array $table = []): static
  {

    $this->for_share = true;

    foreach ((array) $table as $t)
    {
      $this->for_share_of[] = $t;
    }

    return $this;

  }

  public function forShareNoWait(string|array $table = []): static
  {

    $this->for_share_suffix = 'NOWAIT';

    return $this->forShare($table);

  }

  public function forShareSkipLocked(string|array $table = []): static
  {

    $this->for_share_suffix = 'SKIP LOCKED';

    return $this->forShare($table);

  }

  protected function getForShareOf(): string
  {

    if (empty($this->for_share_of))
    {
      return '';
    }

    $table = implode(', ', $this->for_share_of);

    return "OF $table";

  }

  protected function getForShare(): string
  {

    if (!$this->for_share)
    {
      return '';
    }

    return implode(' ', array_filter([
      'FOR SHARE',
      $this->getForShareOf(),
      $this->for_share_suffix,
    ]));

  }

}