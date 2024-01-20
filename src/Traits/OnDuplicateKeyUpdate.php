<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Services\Predicate;

trait OnDuplicateKeyUpdate
{

  protected array $on_duplicate_key_update = [];

  public function onDuplicateKeyUpdate(
    string|array $column,
    string|int|HasBindings $value = null
  ): static
  {

    if (is_array($column))
    {

      if (1 === func_num_args())
      {
        return $this->arrayOnDuplicateKeyUpdate($column);
      }

      $column = '(' . implode(', ', $column) . ')';

    }

    $this->on_duplicate_key_update[] = [$column, $value];

    return $this;

  }

  protected function arrayOnDuplicateKeyUpdate(array $assignments): static
  {

    foreach ($assignments as $column => $value)
    {

      $this->onDuplicateKeyUpdate(
        column: $column,
        value: $value
      );

    }

    return $this;

  }

  protected function getOnDuplicateKeyUpdate(): string
  {

    if (empty($this->on_duplicate_key_update))
    {
      return '';
    }

    foreach ($this->on_duplicate_key_update as [$column, $value])
    {

      $on_duplicate_key_update[] = (string) $predicate = new Predicate(
        column: $column,
        value: $value
      );

      $this->mergeBindings($predicate);

    }

    $on_duplicate_key_update = implode(', ', $on_duplicate_key_update);

    return "ON DUPLICATE KEY UPDATE $on_duplicate_key_update";

  }

}