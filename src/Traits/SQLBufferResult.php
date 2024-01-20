<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait SQLBufferResult
{

  protected string $sql_buffer_result = '';

  public function sqlBufferResult(): static
  {

    $this->sql_buffer_result = 'SQL_BUFFER_RESULT';

    return $this;

  }

  protected function getSQLBufferResult(): string
  {
    return $this->sql_buffer_result;
  }

}