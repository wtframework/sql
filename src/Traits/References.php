<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait References
{

  protected string $references = '';
  protected array $references_column = [];

  public function references(
    string|HasBindings $table,
    string|array $column = null
  ): static
  {

    $this->references = "REFERENCES $table";

    if (null !== $column)
    {
      $this->references_column = (array) $column;
    }

    return $this;

  }

  protected function getReferencesColumn(): string
  {

    if (empty($this->references_column))
    {
      return '';
    }

    $column = implode(', ', $this->references_column);

    return " ($column)";

  }

  protected function getReferences(): string
  {

    if ('' === $this->references)
    {
      return '';
    }

    $column = $this->getReferencesColumn();

    return "$this->references$column";

  }

}