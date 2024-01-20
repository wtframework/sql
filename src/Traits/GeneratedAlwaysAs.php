<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait GeneratedAlwaysAs
{

  protected string|HasBindings $as = '';
  protected string $as_row = '';

  public function as(string|HasBindings $expression): static
  {

    $this->as = $expression;

    return $this;

  }

  public function asRowStart(): static
  {

    $this->as_row = 'ALWAYS AS ROW START';

    return $this;

  }

  public function asRowEnd(): static
  {

    $this->as_row = 'ALWAYS AS ROW END';

    return $this;

  }

  protected function asIdentity(
    string $prefix,
    string $sequence_options
  ): static
  {

    $sequence_options = '' !== $sequence_options ? " ($sequence_options)" : '';

    $this->as_row = "$prefix AS IDENTITY$sequence_options";

    return $this;

  }

  public function alwaysAsIdentity(string $sequence_options = ''): static
  {

    return $this->asIdentity(
      prefix: 'ALWAYS',
      sequence_options: $sequence_options
    );

  }

  public function byDefaultAsIdentity(string $sequence_options = ''): static
  {

    return $this->asIdentity(
      prefix: 'BY DEFAULT',
      sequence_options: $sequence_options
    );

  }

  protected function getAsExpression(): string
  {

    if ('' === $this->as)
    {
      return $this->as_row;
    }

    $as = (string) $this->as;

    if ($this->as instanceof HasBindings)
    {
      $this->mergeBindings($this->as);
    }

    return "ALWAYS AS ($as)";

  }

  protected function getAs(): string
  {

    $as = $this->getAsExpression();

    if ('' === $as)
    {
      return '';
    }

    return "GENERATED $as";

  }

}