<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait RowFormat
{

  protected string $row_format = '';

  public function rowFormatDefault(): static
  {

    $this->row_format = 'ROW_FORMAT DEFAULT';

    return $this;

  }

  public function rowFormatDynamic(): static
  {

    $this->row_format = 'ROW_FORMAT DYNAMIC';

    return $this;

  }

  public function rowFormatFixed(): static
  {

    $this->row_format = 'ROW_FORMAT FIXED';

    return $this;

  }

  public function rowFormatCompressed(): static
  {

    $this->row_format = 'ROW_FORMAT COMPRESSED';

    return $this;

  }

  public function rowFormatRedundant(): static
  {

    $this->row_format = 'ROW_FORMAT REDUNDANT';

    return $this;

  }

  public function rowFormatCompact(): static
  {

    $this->row_format = 'ROW_FORMAT COMPACT';

    return $this;

  }

  public function rowFormatPage(): static
  {

    $this->row_format = 'ROW_FORMAT PAGE';

    return $this;

  }

  protected function getRowFormat(): string
  {
    return $this->row_format;
  }

}