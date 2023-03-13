<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait References
{

  protected string $references = '';
  protected array $references_column = [];

  public function references(
    string $table,
    string|array $column
  ): static
  {

    $this->references = "REFERENCES $table";

    $this->references_column = (array) $column;

    return $this;

  }

  protected function getReferences(): string
  {

    if ('' === $this->references)
    {
      return '';
    }

    $column = implode(', ', $this->references_column);

    return "$this->references ($column)";

  }

}