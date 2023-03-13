<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Online
{

  protected string $online = '';

  public function online(): static
  {

    $this->online = 'ONLINE';

    return $this;

  }

  protected function getOnline(): string
  {
    return $this->online;
  }

}