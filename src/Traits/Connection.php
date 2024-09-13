<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\SQL;

trait Connection
{

  protected string $table_connection = '';

  public function connection(string $connection): static
  {

    $connection = SQL::escape($connection);

    $this->table_connection = "CONNECTION = '$connection'";

    return $this;

  }

  protected function getConnection(): string
  {
    return $this->table_connection;
  }

}