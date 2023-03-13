<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait GeneratedAlways
{

  protected string|HasBindings $generated_always = '';
  protected string $generated_always_row = '';
  protected string $generated_always_suffix = '';

  public function generatedAlways(string|HasBindings $expression = ''): static
  {

    $this->generated_always = $expression;

    return $this;

  }

  public function rowStart(): static
  {

    $this->generated_always_row = 'ROW START';

    return $this;

  }

  public function rowEnd(): static
  {

    $this->generated_always_row = 'ROW END';

    return $this;

  }

  public function stored(): static
  {

    $this->generated_always_suffix = " STORED";

    return $this;

  }

  public function persistent(): static
  {

    $this->generated_always_suffix = " PERSISTENT";

    return $this;

  }

  public function virtual(): static
  {

    $this->generated_always_suffix = " VIRTUAL";

    return $this;

  }

  protected function getGeneratedAlwaysAs(): string
  {

    if ('' !== $this->generated_always_row)
    {
      return $this->generated_always_row;
    }

    if ('' === $this->generated_always)
    {
      return '';
    }

    $as = (string) $this->generated_always;

    if ($this->generated_always instanceof HasBindings)
    {
      $this->mergeBindings(from: $this->generated_always);
    }

    return "($as)$this->generated_always_suffix";

  }

  protected function getGeneratedAlways(): string
  {

    $as = $this->getGeneratedAlwaysAs();

    if ('' === $as)
    {
      return '';
    }

    return "GENERATED ALWAYS AS $as";

  }

}