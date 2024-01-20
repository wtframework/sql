<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait StraightJoin
{

  protected string $straight_join = '';

  public function straightJoinAll(): static
  {

    $this->straight_join = 'STRAIGHT_JOIN';

    return $this;

  }

  protected function getStraightJoin(): string
  {
    return $this->straight_join;
  }

}