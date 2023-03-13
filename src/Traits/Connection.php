<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Connection
{

  protected string $alter_connection = '';

  public function connection(string $connection): static
  {

    $connection = str_replace("'", "''", $connection);

    $this->alter_connection = "CONNECTION '$connection'";

    return $this;

  }

  protected function getConnection(): string
  {
    return $this->alter_connection;
  }

}