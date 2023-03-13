<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait SetAccessMethod
{

  protected string $set_access_method = '';

  public function setAccessMethod(string $name): static
  {

    $this->set_access_method = "SET ACCESS METHOD $name";

    return $this;

  }

  protected function getSetAccessMethod(): string
  {
    return $this->set_access_method;
  }

}