<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\SQL;

trait Password
{

  protected string $password = '';

  public function password(string $password): static
  {

    $password = SQL::escape($password);

    $this->password = "PASSWORD = '$password'";

    return $this;

  }

  protected function getPassword(): string
  {
    return $this->password;
  }

}