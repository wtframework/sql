<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait ConvertTable
{

  protected array $convert_table = [];

  public function convertTable(
    string|HasBindings $table,
    string|HasBindings $partition
  ): static
  {

    $this->convert_table = [
      $table,
      $partition
    ];

    return $this;

  }

  protected function getConvertTable(): string
  {

    if (empty($this->convert_table))
    {
      return '';
    }

    $convert_table = implode(' TO ', $this->convert_table);

    if ($this->convert_table[1] instanceof HasBindings)
    {
      $this->mergeBindings($this->convert_table[1]);
    }

    return "CONVERT TABLE $convert_table";

  }

}