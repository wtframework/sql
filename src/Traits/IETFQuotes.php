<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait IETFQuotes
{

  protected string $ietf_quotes = '';

  public function ietfQuotes(bool $ietf_quotes = true): static
  {

    $ietf_quotes = $ietf_quotes ? 'YES' : 'NO';

    $this->ietf_quotes = "IETF_QUOTES $ietf_quotes";

    return $this;

  }

  protected function getIETFQuotes(): string
  {
    return $this->ietf_quotes;
  }

}