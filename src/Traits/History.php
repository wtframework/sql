<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait History
{

  protected string $history = '';

  public function history(): static
  {

    $this->history = 'HISTORY';

    return $this;

  }

  protected function getHistory(): string
  {
    return $this->history;
  }

}