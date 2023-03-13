<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait AsFileTable
{

  protected string $as_file_table = '';

  public function asFileTable(): static
  {

    $this->as_file_table = 'AS FileTable';

    return $this;

  }

  protected function getAsFileTable(): string
  {
    return $this->as_file_table;
  }

}