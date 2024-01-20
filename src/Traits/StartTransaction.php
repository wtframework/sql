<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait StartTransaction
{

  protected string $start_transaction = '';

  public function startTransaction(): static
  {

    $this->start_transaction = 'START TRANSACTION';

    return $this;

  }

  protected function getStartTransaction(): string
  {
    return $this->start_transaction;
  }

}