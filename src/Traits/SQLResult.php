<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait SQLResult
{

  protected string $sql_result = '';

  public function sqlSmallResult(): static
  {

    $this->sql_result = 'SQL_SMALL_RESULT';

    return $this;

  }

  public function sqlBigResult(): static
  {

    $this->sql_result = 'SQL_BIG_RESULT';

    return $this;

  }

  public function sqlBufferResult(): static
  {

    $this->sql_result = 'SQL_BUFFER_RESULT';

    return $this;

  }

  protected function getSQLResult(): string
  {
    return $this->sql_result;
  }

}