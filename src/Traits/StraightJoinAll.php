<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait StraightJoinAll
{

  protected string $straight_join_all = '';

  public function straightJoinAll(): static
  {

    $this->straight_join_all = 'STRAIGHT_JOIN';

    return $this;

  }

  protected function getStraightJoinAll(): string
  {
    return $this->straight_join_all;
  }

}