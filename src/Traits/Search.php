<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Search
{

  protected string $search = '';
  protected array $first_by = [];
  protected string $set = '';

  protected function search(
    string|array $first_by,
    string $set,
    string $search
  ): static
  {

    $this->search = $search;

    foreach ((array) $first_by as $column)
    {
      $this->first_by[] = $column;
    }

    $this->set = $set;

    return $this;

  }

  public function searchBreadth(
    string|array $first_by,
    string $set
  ): static
  {

    return $this->search(
      first_by: $first_by,
      set: $set,
      search: 'BREADTH'
    );

  }

  public function searchDepth(
    string|array $first_by,
    string $set
  ): static
  {

    return $this->search(
      first_by: $first_by,
      set: $set,
      search: 'DEPTH'
    );

  }

  protected function getSearch(): string
  {

    if ('' === $this->search)
    {
      return '';
    }

    $first_by = implode(', ', $this->first_by);

    return "SEARCH $this->search FIRST BY $first_by SET $this->set";

  }

}