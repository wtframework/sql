<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait WithParser
{

  protected string $with_parser = '';

  public function withParser(string $name): static
  {

    $this->with_parser = "WITH PARSER $name";

    return $this;

  }

  protected function getWithParser(): string
  {
    return $this->with_parser;
  }

}