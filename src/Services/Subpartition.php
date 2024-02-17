<?php

declare(strict_types=1);

namespace WTFramework\SQL\Services;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Comment;
use WTFramework\SQL\Traits\DataDirectory;
use WTFramework\SQL\Traits\Engine;
use WTFramework\SQL\Traits\IndexDirectory;
use WTFramework\SQL\Traits\Macroable;
use WTFramework\SQL\Traits\MaxRows;
use WTFramework\SQL\Traits\MinRows;
use WTFramework\SQL\Traits\NodeGroup;
use WTFramework\SQL\Traits\Tablespace;

class Subpartition implements HasBindings
{

  use Bind;
  use Comment;
  use DataDirectory;
  use Engine;
  use IndexDirectory;
  use Macroable;
  use MaxRows;
  use MinRows;
  use NodeGroup;
  use Tablespace;

  public function __construct(public readonly string $name) {}

  protected function toArray(): array
  {

    return [
      'SUBPARTITION',
      $this->name,
      $this->getEngine(),
      $this->getComment(),
      $this->getDataDirectory(),
      $this->getIndexDirectory(),
      $this->getMaxRows(),
      $this->getMinRows(),
      $this->getTablespace(),
      $this->getNodeGroup(),
    ];

  }

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter($this->toArray()));

  }

}