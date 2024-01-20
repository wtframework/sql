<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Algorithm;
use WTFramework\SQL\Traits\Cascade;
use WTFramework\SQL\Traits\Concurrently;
use WTFramework\SQL\Traits\CreateWith;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\IfElse;
use WTFramework\SQL\Traits\IfExists;
use WTFramework\SQL\Traits\Index;
use WTFramework\SQL\Traits\Lock;
use WTFramework\SQL\Traits\OnTable;
use WTFramework\SQL\Traits\Wait;

class DropIndex extends Statement
{

  use Algorithm;
  use Cascade;
  use Concurrently;
  use CreateWith;
  use Explain;
  use IfElse;
  use IfExists;
  use Index;
  use Lock;
  use OnTable;
  use Wait;

  public function __construct(string|array $index = null)
  {
    $this->index($index);
  }

  protected function toArray(): array
  {

    return [
      $this->getIf(),
      $this->getExplain(),
      "DROP INDEX",
      $this->getConcurrently(),
      $this->getIfExists(),
      $this->getIndex(),
      $this->getOn(),
      $this->getAlgorithm(),
      $this->getLock(),
      $this->getCascade(),
      $this->getWait(),
      $this->getWith(),
      $this->getElse(),
    ];

  }

}