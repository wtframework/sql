<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Grammar;
use WTFramework\SQL\Interfaces\IsGrammar;

trait StaticUseGrammar
{

  protected static ?IsGrammar $grammar = null;

  public static function use(?IsGrammar $grammar): void
  {
    static::$grammar = $grammar;
  }

  public static function grammar(): IsGrammar
  {
    return static::$grammar ?? Grammar::MySQL;
  }

}