<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Clustering;
use WTFramework\SQL\Traits\Column;
use WTFramework\SQL\Traits\Comment;
use WTFramework\SQL\Traits\EngineAttribute;
use WTFramework\SQL\Traits\FullText;
use WTFramework\SQL\Traits\IfNotExists;
use WTFramework\SQL\Traits\Ignored;
use WTFramework\SQL\Traits\IndexType;
use WTFramework\SQL\Traits\Invisible;
use WTFramework\SQL\Traits\KeyBlockSize;
use WTFramework\SQL\Traits\SecondaryEngineAttribute;
use WTFramework\SQL\Traits\Spatial;
use WTFramework\SQL\Traits\WithParser;

class Index implements HasBindings
{

  use Bind;
  use Clustering;
  use Column;
  use Comment;
  use EngineAttribute;
  use FullText;
  use IfNotExists;
  use Ignored;
  use IndexType;
  use Invisible;
  use KeyBlockSize;
  use SecondaryEngineAttribute;
  use Spatial;
  use WithParser;

  public function __construct(public readonly ?string $name = null) {}

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter([
      $this->getFullText() ?: $this->getSpatial(),
      'INDEX',
      $this->getIfNotExists(),
      (string) $this->name,
      $this->getColumn(),
      $this->getKeyBlockSize(),
      $this->getIndexType(),
      $this->getWithParser(),
      $this->getComment(),
      $this->getClustering(),
      $this->getIgnored(),
      $this->getInvisible(),
      $this->getEngineAttribute(),
      $this->getSecondaryEngineAttribute(),
    ]));

  }

}