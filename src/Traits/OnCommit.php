<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait OnCommit
{

  protected string $on_commit = '';

  public function onCommitDeleteRows(): static
  {

    $this->on_commit = 'ON COMMIT DELETE ROWS';

    return $this;

  }

  public function onCommitDrop(): static
  {

    $this->on_commit = 'ON COMMIT DROP';

    return $this;

  }

  protected function getOnCommit(): string
  {
    return $this->on_commit;
  }

}