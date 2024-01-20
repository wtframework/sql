<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait IndexHint
{

  protected array $index_hint = [];

  protected function index(
    string $type,
    string|array|null $index,
    ?string $for
  ): static
  {

    $for = $for ? strtoupper(" FOR $for") : '';

    $index = implode(', ', (array) $index);

    $this->index_hint[] = "$type INDEX$for ($index)";

    return $this;

  }

  public function useIndex(
    string|array $index = null,
    string $for = null
  ): static
  {

    return $this->index(
      type: 'USE',
      index: $index,
      for: $for
    );

  }

  public function useIndexForOrderBy(string|array $index = null): static
  {

    return $this->useIndex(
      index: $index,
      for: 'order by'
    );

  }

  public function useIndexForGroupBy(string|array $index = null): static
  {

    return $this->useIndex(
      index: $index,
      for: 'group by'
    );

  }

  public function ignoreIndex(
    string|array $index = null,
    string $for = null
  ): static
  {

    return $this->index(
      type: 'IGNORE',
      index: $index,
      for: $for
    );

  }

  public function ignoreIndexForOrderBy(string|array $index = null): static
  {

    return $this->ignoreIndex(
      index: $index,
      for: 'order by'
    );

  }

  public function ignoreIndexForGroupBy(string|array $index = null): static
  {

    return $this->ignoreIndex(
      index: $index,
      for: 'group by'
    );

  }

  public function forceIndex(
    string|array $index = null,
    string $for = null
  ): static
  {

    return $this->index(
      type: 'FORCE',
      index: $index,
      for: $for
    );

  }

  public function forceIndexForOrderBy(string|array $index = null): static
  {

    return $this->forceIndex(
      index: $index,
      for: 'order by'
    );

  }

  public function forceIndexForGroupBy(string|array $index = null): static
  {

    return $this->forceIndex(
      index: $index,
      for: 'group by'
    );

  }

  protected function getIndexHint(): string
  {
    return implode(' ', $this->index_hint);
  }

}