<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait IndexDirectory
{

  protected string $index_directory = '';

  public function indexDirectory(string $index_directory): static
  {

    $index_directory = str_replace("'", "''", $index_directory);

    $this->index_directory = "INDEX DIRECTORY '$index_directory'";

    return $this;

  }

  protected function getIndexDirectory(): string
  {
    return $this->index_directory;
  }

}