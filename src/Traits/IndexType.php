<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait IndexType
{

  protected string $index_type = '';

  public function usingBTree(): static
  {

    $this->index_type = 'USING BTREE';

    return $this;

  }

  public function usingHash(): static
  {

    $this->index_type = 'USING HASH';

    return $this;

  }

  public function usingRTree(): static
  {

    $this->index_type = 'USING RTREE';

    return $this;

  }

  protected function getIndexType(): string
  {
    return $this->index_type;
  }

}