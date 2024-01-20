<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait RowAlias
{

  protected string $row_alias = '';
  protected array $column_alias = [];

  public function rowAlias(
    string $row_alias,
    string|array $column_alias = null
  ): static
  {

    $this->row_alias = "AS $row_alias";

    $this->column_alias = (array) $column_alias;

    return $this;

  }

  protected function getColumnAlias(): string
  {

    if (empty($this->column_alias))
    {
      return '';
    }

    $column_alias = implode(', ', $this->column_alias);

    return " ($column_alias)";

  }

  protected function getRowAlias(): string
  {

    if ('' === $this->row_alias)
    {
      return '';
    }

    $column_alias = $this->getColumnAlias();

    return "$this->row_alias$column_alias";

  }

}