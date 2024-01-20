<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\IsGrammar;
use WTFramework\SQL\SQL;

trait UseGrammar
{

  protected ?IsGrammar $grammar = null;

  public function use(?IsGrammar $grammar): static
  {

    $this->grammar = $grammar;

    return $this;

  }

  public function grammar(): IsGrammar
  {
    return $this->grammar ?? SQL::grammar();
  }

}