<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ColumnFormat
{

  protected string $column_format = '';

  public function columnFormatFixed(): static
  {

    $this->column_format = 'COLUMN_FORMAT FIXED';

    return $this;

  }

  public function columnFormatDynamic(): static
  {

    $this->column_format = 'COLUMN_FORMAT DYNAMIC';

    return $this;

  }

  public function columnFormatDefault(): static
  {

    $this->column_format = 'COLUMN_FORMAT DEFAULT';

    return $this;

  }

  protected function getColumnFormat(): string
  {
    return $this->column_format;
  }

}