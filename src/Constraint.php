<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Charset;
use WTFramework\SQL\Traits\Check;
use WTFramework\SQL\Traits\Clustering;
use WTFramework\SQL\Traits\Column;
use WTFramework\SQL\Traits\ColumnAutoIncrement;
use WTFramework\SQL\Traits\Comment;
use WTFramework\SQL\Traits\DefaultValue;
use WTFramework\SQL\Traits\Deferred;
use WTFramework\SQL\Traits\Enforced;
use WTFramework\SQL\Traits\ForeignKey;
use WTFramework\SQL\Traits\GeneratedAlways;
use WTFramework\SQL\Traits\IfNotExists;
use WTFramework\SQL\Traits\Ignored;
use WTFramework\SQL\Traits\IndexName;
use WTFramework\SQL\Traits\IndexType;
use WTFramework\SQL\Traits\KeyBlockSize;
use WTFramework\SQL\Traits\NotNull;
use WTFramework\SQL\Traits\OnConflict;
use WTFramework\SQL\Traits\OnDelete;
use WTFramework\SQL\Traits\OnUpdate;
use WTFramework\SQL\Traits\PrimaryKey;
use WTFramework\SQL\Traits\References;
use WTFramework\SQL\Traits\Unique;
use WTFramework\SQL\Traits\WithParser;

class Constraint implements HasBindings
{

  use Bind;
  use Charset;
  use Check;
  use Clustering;
  use Column;
  use ColumnAutoIncrement;
  use Comment;
  use DefaultValue;
  use Deferred;
  use Enforced;
  use ForeignKey;
  use GeneratedAlways;
  use IfNotExists;
  use Ignored;
  use IndexName;
  use IndexType;
  use KeyBlockSize;
  use NotNull;
  use OnConflict;
  use OnDelete;
  use OnUpdate;
  use PrimaryKey;
  use References;
  use Unique;
  use WithParser;

  public function __construct(
    public readonly DBMS $dbms,
    public readonly ?string $name = null
  ) {}

  protected function getName(): string
  {

    if (null === $this->name)
    {
      return '';
    }

    return "CONSTRAINT $this->name";

  }

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter([
      $this->getName(),
      $this->getNotNull(),
      $this->getColumnAutoIncrement(),
      $this->getCheck(),
      $this->getEnforced(),
      $this->getDefaultValue(),
      $this->getCharset(),
      $this->getUnique(),
      $this->getPrimaryKey(),
      $this->getForeignKey(),
      $this->getIfNotExists(),
      $this->getIndexName(),
      $this->getOnConflict(),
      $this->getColumn(),
      $this->getKeyBlockSize(),
      $this->getIndexType(),
      $this->getWithParser(),
      $this->getComment(),
      $this->getClustering(),
      $this->getIgnored(),
      $this->getReferences(),
      $this->getOnDelete(),
      $this->getOnUpdate(),
      $this->getDeferred(),
      $this->getGeneratedAlways(),
    ]));

  }

}