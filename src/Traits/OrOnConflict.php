<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait OrOnConflict
{

  protected string $or = '';

  public function orFail(): static
  {

    $this->or = 'OR FAIL';

    return $this;

  }

  public function orIgnore(): static
  {

    $this->or = 'OR IGNORE';

    return $this;

  }

  public function orRollBack(): static
  {

    $this->or = 'OR ROLLBACK';

    return $this;

  }

  protected function getOr(): string
  {
    return $this->or;
  }

}