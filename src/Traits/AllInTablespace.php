<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait AllInTablespace
{

  protected string $all_in_tablespace = '';

  public function allInTablespace(): static
  {

    $this->all_in_tablespace = 'ALL IN TABLESPACE';

    return $this;

  }

  protected function getAllInTablespace(): string
  {
    return $this->all_in_tablespace;
  }

}