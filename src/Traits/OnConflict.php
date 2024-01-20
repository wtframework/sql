<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait OnConflict
{

  protected string $on_conflict = '';

  public function onConflictRollback(): static
  {

    $this->on_conflict = 'ON CONFLICT ROLLBACK';

    return $this;

  }

  public function onConflictFail(): static
  {

    $this->on_conflict = 'ON CONFLICT FAIL';

    return $this;

  }

  public function onConflictIgnore(): static
  {

    $this->on_conflict = 'ON CONFLICT IGNORE';

    return $this;

  }

  public function onConflictReplace(): static
  {

    $this->on_conflict = 'ON CONFLICT REPLACE';

    return $this;

  }

  protected function getOnConflict(): string
  {
    return $this->on_conflict;
  }

}