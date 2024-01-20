<?php

declare(strict_types=1);

namespace WTFramework\SQL\Services;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Check;
use WTFramework\SQL\Traits\Clustering;
use WTFramework\SQL\Traits\Column;
use WTFramework\SQL\Traits\ColumnPrimaryKey;
use WTFramework\SQL\Traits\ColumnUnique;
use WTFramework\SQL\Traits\Comment;
use WTFramework\SQL\Traits\CreateWith;
use WTFramework\SQL\Traits\Deferrable;
use WTFramework\SQL\Traits\Enforced;
use WTFramework\SQL\Traits\EngineAttribute;
use WTFramework\SQL\Traits\Exclude;
use WTFramework\SQL\Traits\ForeignKey;
use WTFramework\SQL\Traits\ForeignKeyMatch;
use WTFramework\SQL\Traits\IfNotExists;
use WTFramework\SQL\Traits\Ignored;
use WTFramework\SQL\Traits\IncludeColumn;
use WTFramework\SQL\Traits\IndexName;
use WTFramework\SQL\Traits\IndexType;
use WTFramework\SQL\Traits\KeyBlockSize;
use WTFramework\SQL\Traits\NoInherit;
use WTFramework\SQL\Traits\NotValid;
use WTFramework\SQL\Traits\NullsDistinct;
use WTFramework\SQL\Traits\OnConflict;
use WTFramework\SQL\Traits\OnDelete;
use WTFramework\SQL\Traits\OnUpdate;
use WTFramework\SQL\Traits\References;
use WTFramework\SQL\Traits\SecondaryEngineAttribute;
use WTFramework\SQL\Traits\UsingIndexTablespace;
use WTFramework\SQL\Traits\Visibility;
use WTFramework\SQL\Traits\Where;
use WTFramework\SQL\Traits\WithParser;

class Constraint implements HasBindings
{

  use Bind;
  use Check;
  use Clustering;
  use Column;
  use ColumnPrimaryKey;
  use ColumnUnique;
  use Comment;
  use CreateWith;
  use Deferrable;
  use Enforced;
  use EngineAttribute;
  use Exclude;
  use ForeignKey;
  use ForeignKeyMatch;
  use IfNotExists;
  use Ignored;
  use IncludeColumn;
  use IndexName;
  use IndexType;
  use KeyBlockSize;
  use NoInherit;
  use NotValid;
  use NullsDistinct;
  use OnConflict;
  use OnDelete;
  use OnUpdate;
  use References;
  use SecondaryEngineAttribute;
  use UsingIndexTablespace;
  use Visibility;
  use Where;
  use WithParser;

  public function __construct(public readonly string $name = '') {}

  protected function getName(): string
  {

    if ('' === $this->name)
    {
      return '';
    }

    return "CONSTRAINT $this->name";

  }

  protected function toArray(): array
  {

    return [
      $this->getName(),
      $this->getNoInherit(),
      $this->getPrimaryKey() ?: $this->getUnique() ?: $this->getForeignKey() ?: $this->getExclude(),
      $this->getIfNotExists(),
      $this->getIndexName(),
      $this->getNullsDistinct(),
      $this->getUsing(),
      $this->getColumn(),
      $this->getInclude(),
      $this->getWith(),
      $this->getUsingIndexTablespace(),
      $this->getWhere(parentheses: true),
      $this->getOnConflict(),
      $this->getReferences(),
      $this->getMatch(),
      $this->getOnDelete(),
      $this->getOnUpdate(),
      $this->getKeyBlockSize(),
      $this->getWithParser(),
      $this->getComment(),
      $this->getClustering(),
      $this->getIgnored(),
      $this->getVisibility(),
      $this->getEngineAttribute(),
      $this->getSecondaryEngineAttribute(),
      $this->getCheck(),
      $this->getEnforced(),
      $this->getDeferrable(),
      $this->getNotValid(),
    ];

  }

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter($this->toArray()));

  }

}