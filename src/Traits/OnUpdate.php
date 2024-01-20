<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait OnUpdate
{

  protected string $on_update = '';

  public function onUpdateSetNull(): static
  {

    $this->on_update = 'ON UPDATE SET NULL';

    return $this;

  }

  public function onUpdateSetDefault(): static
  {

    $this->on_update = 'ON UPDATE SET DEFAULT';

    return $this;

  }

  public function onUpdateCascade(): static
  {

    $this->on_update = 'ON UPDATE CASCADE';

    return $this;

  }

  public function onUpdateRestrict(): static
  {

    $this->on_update = 'ON UPDATE RESTRICT';

    return $this;

  }

  protected function getOnUpdate(): string
  {
    return $this->on_update;
  }

}