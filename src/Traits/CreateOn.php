<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait CreateOn
{

  protected string $create_on = '';
  protected string $create_on_column = '';

  public function on(
    string $name,
    string $column = null
    ): static
  {

    $this->create_on = $name;

    if ($column)
    {
      $this->create_on_column = $column;
    }

    return $this;

  }

  protected function getCreateOnColumn(): string
  {

    if ('' === $this->create_on_column)
    {
      return '';
    }

    return " ($this->create_on_column)";

  }

  protected function getCreateOn(): string
  {

    if ('' === $this->create_on)
    {
      return '';
    }

    $create_on_column = $this->getCreateOnColumn();

    return "ON $this->create_on$create_on_column";

  }

}