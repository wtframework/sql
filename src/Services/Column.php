<?php

declare(strict_types=1);

namespace WTFramework\SQL\Services;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\After;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\CharacterSet;
use WTFramework\SQL\Traits\Check;
use WTFramework\SQL\Traits\Collate;
use WTFramework\SQL\Traits\ColumnAutoIncrement;
use WTFramework\SQL\Traits\ColumnPrimaryKey;
use WTFramework\SQL\Traits\ColumnUnique;
use WTFramework\SQL\Traits\Comment;
use WTFramework\SQL\Traits\Compression;
use WTFramework\SQL\Traits\DataType;
use WTFramework\SQL\Traits\DefaultValue;
use WTFramework\SQL\Traits\Deferrable;
use WTFramework\SQL\Traits\EngineAttribute;
use WTFramework\SQL\Traits\First;
use WTFramework\SQL\Traits\ForeignKeyMatch;
use WTFramework\SQL\Traits\Format;
use WTFramework\SQL\Traits\GeneratedAlwaysAs;
use WTFramework\SQL\Traits\Identity;
use WTFramework\SQL\Traits\IfExists;
use WTFramework\SQL\Traits\IfNotExists;
use WTFramework\SQL\Traits\Macroable;
use WTFramework\SQL\Traits\NoInherit;
use WTFramework\SQL\Traits\NotNull;
use WTFramework\SQL\Traits\NullsDistinct;
use WTFramework\SQL\Traits\OnConflict;
use WTFramework\SQL\Traits\OnDelete;
use WTFramework\SQL\Traits\OnUpdate;
use WTFramework\SQL\Traits\OnUpdateCurrentTimestamp;
use WTFramework\SQL\Traits\Persistent;
use WTFramework\SQL\Traits\References;
use WTFramework\SQL\Traits\RefSystemID;
use WTFramework\SQL\Traits\SecondaryEngineAttribute;
use WTFramework\SQL\Traits\Signed;
use WTFramework\SQL\Traits\Storage;
use WTFramework\SQL\Traits\Stored;
use WTFramework\SQL\Traits\UseGrammar;
use WTFramework\SQL\Traits\Virtual;
use WTFramework\SQL\Traits\Visibility;
use WTFramework\SQL\Traits\WithOptions;
use WTFramework\SQL\Traits\WithSystemVersioning;
use WTFramework\SQL\Traits\ZeroFill;

class Column implements HasBindings
{

  use After;
  use Bind;
  use CharacterSet;
  use Check;
  use Collate;
  use ColumnAutoIncrement;
  use ColumnPrimaryKey;
  use ColumnUnique;
  use Comment;
  use Compression;
  use DataType;
  use DefaultValue;
  use Deferrable;
  use EngineAttribute;
  use First;
  use ForeignKeyMatch;
  use Format;
  use GeneratedAlwaysAs;
  use Identity;
  use IfExists;
  use IfNotExists;
  use Macroable;
  use NoInherit;
  use NotNull;
  use NullsDistinct;
  use OnConflict;
  use OnDelete;
  use OnUpdate;
  use OnUpdateCurrentTimestamp;
  use Persistent;
  use References;
  use RefSystemID;
  use SecondaryEngineAttribute;
  use Signed;
  use Storage;
  use Stored;
  use UseGrammar;
  use Virtual;
  use Visibility;
  use WithOptions;
  use WithSystemVersioning;
  use ZeroFill;

  public function __construct(public readonly string $name) {}

  protected function toArray(): array
  {

    return [
      $this->getIfNotExists() ?: $this->getIfExists(),
      $this->name,
      $this->getDataType(),
      $this->getLength() ?: $this->getValues(),
      $this->getWithTimeZone(),
      $this->getWithOptions(),
      $this->getSigned(),
      $this->getCompression(),
      $this->getCharacterSet(),
      $this->getCollate(),
      $this->getNotNull(),
      $this->getNoInherit(),
      $this->getDefault(),
      $this->getOnUpdateCurrentTimestamp(),
      $this->getOnConflict(),
      $this->getZeroFill(),
      $this->getAs(),
      $this->getVirtual() ?: $this->getPersistent() ?: $this->getStored(),
      $this->getIdentity(),
      $this->getPrimaryKey() ?: $this->getUnique(),
      $this->getAutoIncrement($this->grammar()->autoIncrement()),
      $this->getVisibility(),
      $this->getWithSystemVersioning(),
      $this->getComment(),
      $this->getFormat(),
      $this->getEngineAttribute(),
      $this->getSecondaryEngineAttribute(),
      $this->getStorage(),
      $this->getRefSystemID(),
      $this->getNullsDistinct(),
      $this->getReferences(),
      $this->getMatch(),
      $this->getOnDelete(),
      $this->getOnUpdate(),
      $this->getDeferrable(),
      $this->getCheck(),
      $this->getFirst() ?: $this->getAfter(),
    ];

  }

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter($this->toArray()));

  }

}