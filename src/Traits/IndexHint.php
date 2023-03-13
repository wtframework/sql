<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait IndexHint
{

  protected array $index_hint = [];

  protected function index(
    string $type,
    string|array $index,
    string $for = null
  ): static
  {

    $for = $for ? " FOR $for" : '';

    $index = implode(', ', (array) $index);

    $this->index_hint[] = "$type INDEX$for ($index)";

    return $this;

  }

  public function useIndex(
    string|array $index,
    string $for = null
  ): static
  {

    return $this->index(
      type: 'USE',
      index: $index,
      for: $for
    );

  }

  public function useIndexForJoin(string|array $index): static
  {

    return $this->useIndex(
      index: $index,
      for: 'JOIN'
    );

  }

  public function useIndexForOrderBy(string|array $index): static
  {

    return $this->useIndex(
      index: $index,
      for: 'ORDER BY'
    );

  }

  public function useIndexForGroupBy(string|array $index): static
  {

    return $this->useIndex(
      index: $index,
      for: 'GROUP BY'
    );

  }

  public function ignoreIndex(
    string|array $index,
    string $for = null
  ): static
  {

    return $this->index(
      type: 'IGNORE',
      index: $index,
      for: $for
    );

  }

  public function ignoreIndexForJoin(string|array $index): static
  {

    return $this->ignoreIndex(
      index: $index,
      for: 'JOIN'
    );

  }

  public function ignoreIndexForOrderBy(string|array $index): static
  {

    return $this->ignoreIndex(
      index: $index,
      for: 'ORDER BY'
    );

  }

  public function ignoreIndexForGroupBy(string|array $index): static
  {

    return $this->ignoreIndex(
      index: $index,
      for: 'GROUP BY'
    );

  }

  public function forceIndex(
    string|array $index,
    string $for = null
  ): static
  {

    return $this->index(
      type: 'FORCE',
      index: $index,
      for: $for
    );

  }

  public function forceIndexForJoin(string|array $index): static
  {

    return $this->forceIndex(
      index: $index,
      for: 'JOIN'
    );

  }

  public function forceIndexForOrderBy(string|array $index): static
  {

    return $this->forceIndex(
      index: $index,
      for: 'ORDER BY'
    );

  }

  public function forceIndexForGroupBy(string|array $index): static
  {

    return $this->forceIndex(
      index: $index,
      for: 'GROUP BY'
    );

  }

  protected function getIndexHint(): string
  {
    return implode(' ', $this->index_hint);
  }

}