<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Invisible
{

  protected string $invisible = '';

  public function invisible(): static
  {

    $this->invisible = 'INVISIBLE';

    return $this;

  }

  public function notInvisible(): static
  {

    $this->invisible = 'NOT INVISIBLE';

    return $this;

  }

  public function visible(): static
  {

    $this->invisible = 'VISIBLE';

    return $this;

  }

  protected function getInvisible(): string
  {
    return $this->invisible;
  }

}