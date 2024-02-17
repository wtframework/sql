<?php

declare(strict_types=1);

namespace WTFramework\SQL\Services;

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
use WTFramework\SQL\Traits\KeyBlockSize;
use WTFramework\SQL\Traits\Macroable;
use WTFramework\SQL\Traits\SecondaryEngineAttribute;
use WTFramework\SQL\Traits\Spatial;
use WTFramework\SQL\Traits\Visibility;
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
  use KeyBlockSize;
  use Macroable;
  use SecondaryEngineAttribute;
  use Spatial;
  use Visibility;
  use WithParser;

  public function __construct(public readonly string $name = '') {}

  protected function toArray(): array
  {

    return [
      $this->getFullText() ?: $this->getSpatial(),
      'INDEX',
      $this->getIfNotExists(),
      $this->name,
      $this->getUsing(),
      $this->getColumn(),
      $this->getKeyBlockSize(),
      $this->getWithParser(),
      $this->getComment(),
      $this->getClustering(),
      $this->getIgnored(),
      $this->getVisibility(),
      $this->getEngineAttribute(),
      $this->getSecondaryEngineAttribute(),
    ];

  }

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter($this->toArray()));

  }

}