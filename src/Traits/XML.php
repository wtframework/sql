<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait XML
{

  protected string $xml = '';

  public function xml(): static
  {

    $this->xml = 'XML';

    return $this;

  }

  public function primaryXML(): static
  {

    $this->xml = 'PRIMARY XML';

    return $this;

  }

  protected function getXML(): string
  {
    return $this->xml;
  }

}