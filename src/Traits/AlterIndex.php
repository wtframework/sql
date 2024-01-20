<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait AlterIndex
{

  protected array $alter_index = [];

  protected function alterIndex(
    string|array $index,
    string $suffix
  ): static
  {

    foreach ((array) $index as $i)
    {
      $this->alter_index[] = "ALTER INDEX $i $suffix";
    }

    return $this;

  }

  public function indexInvisible(string|array $index): static
  {

    return $this->alterIndex(
      index: $index,
      suffix: 'INVISIBLE'
    );

  }

  public function indexNotInvisible(string|array $index): static
  {

    return $this->alterIndex(
      index: $index,
      suffix: 'NOT INVISIBLE'
    );

  }

  public function indexVisible(string|array $index): static
  {

    return $this->alterIndex(
      index: $index,
      suffix: 'VISIBLE'
    );

  }

  protected function getAlterIndex(): string
  {
    return implode(', ', $this->alter_index);
  }

}