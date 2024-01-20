<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait SQLSmallResult
{

  protected string $sql_small_result = '';

  public function sqlSmallResult(): static
  {

    $this->sql_small_result = 'SQL_SMALL_RESULT';

    return $this;

  }

  protected function getSQLSmallResult(): string
  {
    return $this->sql_small_result;
  }

}