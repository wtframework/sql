<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait SetLogged
{

  protected string $set_logged = '';

  public function setLogged(): static
  {

    $this->set_logged = 'SET LOGGED';

    return $this;

  }

  public function setUnlogged(): static
  {

    $this->set_logged = 'SET UNLOGGED';

    return $this;

  }

  protected function getSetLogged(): string
  {
    return $this->set_logged;
  }

}