<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait IndexName
{

  protected string $index_name = '';

  public function index(string $name): static
  {

    $this->index_name = $name;

    return $this;

  }

  protected function getIndexName(): string
  {
    return $this->index_name;
  }

}