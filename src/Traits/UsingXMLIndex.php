<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait UsingXMLIndex
{

  protected string $using_xml_index = '';

  public function usingXMLIndex(string $name): static
  {

    $this->using_xml_index = "USING XML INDEX $name";

    return $this;

  }

  protected function getUsingXMLIndex(): string
  {
    return $this->using_xml_index;
  }

}