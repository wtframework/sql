<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait OnDelete
{

  protected string $on_delete = '';

  public function onDeleteSetDefault(): static
  {

    $this->on_delete = 'ON DELETE SET DEFAULT';

    return $this;

  }

  public function onDeleteSetNull(): static
  {

    $this->on_delete = 'ON DELETE SET NULL';

    return $this;

  }

  public function onDeleteCascade(): static
  {

    $this->on_delete = 'ON DELETE CASCADE';

    return $this;

  }

  public function onDeleteRestrict(): static
  {

    $this->on_delete = 'ON DELETE RESTRICT';

    return $this;

  }

  protected function getOnDelete(): string
  {
    return $this->on_delete;
  }

}