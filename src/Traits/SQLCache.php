<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait SQLCache
{

  protected string $sql_cache = '';

  public function sqlCache(): static
  {

    $this->sql_cache = 'SQL_CACHE';

    return $this;

  }

  public function sqlNoCache(): static
  {

    $this->sql_cache = 'SQL_NO_CACHE';

    return $this;

  }

  protected function getSQLCache(): string
  {
    return $this->sql_cache;
  }

}