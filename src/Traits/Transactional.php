<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Transactional
{

  protected string $transactional = '';

  public function transactional(bool $value = true): static
  {

    $value = (int) $value;

    $this->transactional = "TRANSACTIONAL = $value";

    return $this;

  }

  protected function getTransactional(): string
  {
    return $this->transactional;
  }

}