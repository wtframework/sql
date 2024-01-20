<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Password
{

  protected string $password = '';

  public function password(string $password): static
  {

    $password = str_replace("'", "''", $password);

    $this->password = "PASSWORD '$password'";

    return $this;

  }

  protected function getPassword(): string
  {
    return $this->password;
  }

}