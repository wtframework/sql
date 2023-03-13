<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait DataDirectory
{

  protected string $data_directory = '';

  public function dataDirectory(string $data_directory): static
  {

    $data_directory = str_replace("'", "''", $data_directory);

    $this->data_directory = "DATA DIRECTORY '$data_directory'";

    return $this;

  }

  protected function getDataDirectory(): string
  {
    return $this->data_directory;
  }

}