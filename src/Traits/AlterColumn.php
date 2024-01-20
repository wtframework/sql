<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\SQL;

trait AlterColumn
{

  protected array $alter_column = [];

  protected function alterColumn(
    string|array $column,
    string $suffix,
    string|int|HasBindings $expression = null
  ): static
  {

    if (is_string($expression))
    {
      $expression = SQL::bind($expression);
    }

    foreach ((array) $column as $c)
    {
      $this->alter_column[] = [$c, $suffix, $expression];
    }

    return $this;

  }

  public function columnSetDefault(
    string|array $column,
    string|int|HasBindings $expression
  ): static
  {

    return $this->alterColumn(
      column: $column,
      suffix: 'SET DEFAULT',
      expression: $expression
    );

  }

  public function columnDropDefault(string|array $column): static
  {

    return $this->alterColumn(
      column: $column,
      suffix: 'DROP DEFAULT'
    );

  }

  public function columnSetVisible(string|array $column): static
  {

    return $this->alterColumn(
      column: $column,
      suffix: 'SET VISIBLE'
    );

  }

  public function columnSetInvisible(string|array $column): static
  {

    return $this->alterColumn(
      column: $column,
      suffix: 'SET INVISIBLE'
    );

  }

  public function columnSetNotNull(string|array $column): static
  {

    return $this->alterColumn(
      column: $column,
      suffix: 'SET NOT NULL'
    );

  }

  public function columnDropNotNull(string|array $column): static
  {

    return $this->alterColumn(
      column: $column,
      suffix: 'DROP NOT NULL'
    );

  }

  public function columnDropExpression(string|array $column): static
  {

    return $this->alterColumn(
      column: $column,
      suffix: 'DROP EXPRESSION'
    );

  }

  public function columnDropExpressionIfExists(string|array $column): static
  {

    return $this->alterColumn(
      column: $column,
      suffix: 'DROP EXPRESSION IF EXISTS'
    );

  }

  public function columnDropIdentity(string|array $column): static
  {

    return $this->alterColumn(
      column: $column,
      suffix: 'DROP IDENTITY'
    );

  }

  public function columnDropIdentityIfExists(string|array $column): static
  {

    return $this->alterColumn(
      column: $column,
      suffix: 'DROP IDENTITY IF EXISTS'
    );

  }

  public function columnSetStatistics(
    string|array $column,
    int $value
  ): static
  {

    return $this->alterColumn(
      column: $column,
      suffix: "SET STATISTICS $value"
    );

  }

  public function columnSetStoragePlain(string|array $column): static
  {

    return $this->alterColumn(
      column: $column,
      suffix: 'SET STORAGE PLAIN'
    );

  }

  public function columnSetStorageExternal(string|array $column): static
  {

    return $this->alterColumn(
      column: $column,
      suffix: 'SET STORAGE EXTERNAL'
    );

  }

  public function columnSetStorageExtended(string|array $column): static
  {

    return $this->alterColumn(
      column: $column,
      suffix: 'SET STORAGE EXTENDED'
    );

  }

  public function columnSetStorageMain(string|array $column): static
  {

    return $this->alterColumn(
      column: $column,
      suffix: 'SET STORAGE MAIN'
    );

  }

  public function columnSetCompression(
    string|array $column,
    string $method
  ): static
  {

    return $this->alterColumn(
      column: $column,
      suffix: "SET COMPRESSION $method"
    );

  }

  protected function getAlterColumn(): string
  {

    if (empty($this->alter_column))
    {
      return '';
    }

    foreach ($this->alter_column as [$column, $suffix, $expression])
    {

      if (null !== $expression)
      {
        $suffix = "$suffix ($expression)";
      }

      if ($expression instanceof HasBindings)
      {
        $this->mergeBindings($expression);
      }

      $alter_column[] = "ALTER COLUMN $column $suffix";

    }

    return implode(', ', $alter_column);

  }

}