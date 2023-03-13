<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait UsingMethod
{

  protected string $using_method = '';

  public function usingMethod(string $method): static
  {

    $this->using_method = "USING $method";

    return $this;

  }

  protected function getUsingMethod(): string
  {
    return $this->using_method;
  }

}