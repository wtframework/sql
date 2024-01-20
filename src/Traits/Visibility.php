<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Visibility
{

  protected string $visibility = '';

  public function invisible(): static
  {

    $this->visibility = 'INVISIBLE';

    return $this;

  }

  public function notInvisible(): static
  {

    $this->visibility = 'NOT INVISIBLE';

    return $this;

  }

  public function visible(): static
  {

    $this->visibility = 'VISIBLE';

    return $this;

  }

  protected function getVisibility(): string
  {
    return $this->visibility;
  }

}