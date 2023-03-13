<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Traits\After;
use WTFramework\SQL\Traits\Bind;
use WTFramework\SQL\Traits\Charset;
use WTFramework\SQL\Traits\Check;
use WTFramework\SQL\Traits\Column as TraitsColumn;
use WTFramework\SQL\Traits\ColumnAutoIncrement;
use WTFramework\SQL\Traits\ColumnFormat;
use WTFramework\SQL\Traits\ColumnNoInherit;
use WTFramework\SQL\Traits\Comment;
use WTFramework\SQL\Traits\Constraint;
use WTFramework\SQL\Traits\CreateWith;
use WTFramework\SQL\Traits\DataType;
use WTFramework\SQL\Traits\DefaultValue;
use WTFramework\SQL\Traits\Deferred;
use WTFramework\SQL\Traits\Enforced;
use WTFramework\SQL\Traits\EngineAttribute;
use WTFramework\SQL\Traits\First;
use WTFramework\SQL\Traits\GeneratedAlways;
use WTFramework\SQL\Traits\IfExists;
use WTFramework\SQL\Traits\IfNotExists;
use WTFramework\SQL\Traits\IncludeColumn;
use WTFramework\SQL\Traits\Invisible;
use WTFramework\SQL\Traits\NotNull;
use WTFramework\SQL\Traits\OnConflict;
use WTFramework\SQL\Traits\OnDelete;
use WTFramework\SQL\Traits\OnUpdate;
use WTFramework\SQL\Traits\OnUpdateCurrentTimestamp;
use WTFramework\SQL\Traits\PrimaryKey;
use WTFramework\SQL\Traits\References;
use WTFramework\SQL\Traits\RefSystemID;
use WTFramework\SQL\Traits\SecondaryEngineAttribute;
use WTFramework\SQL\Traits\Signed;
use WTFramework\SQL\Traits\Storage;
use WTFramework\SQL\Traits\Unique;
use WTFramework\SQL\Traits\UsingIndexTablespace;
use WTFramework\SQL\Traits\WithSystemVersioning;
use WTFramework\SQL\Traits\ZeroFill;

class Column implements HasBindings
{

  use After;
  use Bind;
  use Charset;
  use Check;
  use ColumnAutoIncrement;
  use Constraint;
  use ColumnFormat;
  use ColumnNoInherit;
  use Comment;
  use CreateWith;
  use DataType;
  use DefaultValue;
  use Deferred;
  use Enforced;
  use EngineAttribute;
  use First;
  use GeneratedAlways;
  use IfExists;
  use IfNotExists;
  use IncludeColumn;
  use Invisible;
  use NotNull;
  use OnDelete;
  use OnConflict;
  use OnUpdate;
  use OnUpdateCurrentTimestamp;
  use PrimaryKey;
  use References;
  use RefSystemID;
  use SecondaryEngineAttribute;
  use Signed;
  use Storage;
  use TraitsColumn;
  use Unique;
  use UsingIndexTablespace;
  use WithSystemVersioning;
  use ZeroFill;

  public function __construct(
    public readonly DBMS $dbms,
    public readonly string $name
  ) {}

  public function __toString(): string
  {

    $this->bindings = [];

    return implode(' ', array_filter(match ($dbms = $this->dbms)
    {

      DBMS::MariaDB => [
        $this->getIfNotExists(),
        $this->getIfExists(),
        $this->name,
        $this->getDataType(),
        $this->getLength() ?: $this->getValues(),
        $this->getCharset(),
        $this->getSigned(),
        $this->getNotNull(),
        $this->getDefaultValue(),
        $this->getOnUpdateCurrentTimestamp(),
        $this->getColumnAutoIncrement(),
        $this->getZeroFill(),
        $this->getUnique(),
        $this->getPrimaryKey(),
        $this->getInvisible(),
        $this->getWithSystemVersioning(),
        $this->getComment(),
        $this->getRefSystemID(),
        $this->getReferences(),
        $this->getColumn(),
        $this->getOnDelete(),
        $this->getOnUpdate(),
        $this->getGeneratedAlways(),
        $this->getConstraint(' '),
        $this->getCheck(),
        $this->getFirst() ?: $this->getAfter(),
      ],

      DBMS::MySQL => [
        $this->name,
        $this->getDataType(),
        $this->getLength() ?: $this->getValues(),
        $this->getCharset(),
        $this->getSigned(),
        $this->getDefaultValue(),
        $this->getGeneratedAlways(),
        $this->getNotNull(),
        $this->getInvisible(),
        $this->getColumnAutoIncrement(),
        $this->getUnique(),
        $this->getPrimaryKey(),
        $this->getComment(),
        $this->getColumnFormat(),
        $this->getEngineAttribute(),
        $this->getSecondaryEngineAttribute(),
        $this->getStorage(),
        $this->getReferences(),
        $this->getColumn(),
        $this->getOnDelete(),
        $this->getOnUpdate(),
        $this->getConstraint(' '),
        $this->getCheck(),
        $this->getEnforced(),
        $this->getFirst() ?: $this->getAfter(),
      ],

      DBMS::SQLite => [
        $this->name,
        $this->getDataType(),
        $this->getLength() ?: $this->getValues(),
        $this->getCharset(),
        $this->getConstraint(' '),
        $this->getPrimaryKey(),
        $this->getNotNull(),
        $this->getUnique(),
        $this->getOnConflict(),
        $this->getColumnAutoIncrement(),
        $this->getCheck(),
        $this->getDefaultValue(),
        $this->getReferences(),
        $this->getColumn(),
        $this->getOnDelete(),
        $this->getOnUpdate(),
        $this->getDeferred(),
        $this->getGeneratedAlways(),
      ],

      DBMS::PostgreSQL => [
        $this->getIfNotExists(),
        $this->name,
        $this->getDataType(),
        $this->getLength() ?: $this->getValues(),
        $this->getWithTimeZone(),
        $this->getCharset(),
        $this->getSigned(),
        $this->getConstraint(' '),
        $this->getNotNull(),
        $this->getCheck(),
        $this->getNoInherit(),
        $this->getDefaultValue(),
        $this->getGeneratedAlways(),
        $this->getUnique(),
        $this->getPrimaryKey(),
        $this->getIncludeColumn(),
        $this->getCreateWith(),
        $this->getUsingIndexTablespace(),
        $this->getReferences(),
        $this->getColumn(),
        $this->getOnDelete(),
        $this->getOnUpdate(),
        $this->getDeferred(),
      ],

      DBMS::SQLServer => [
      ],

      default =>
        throw new SQLException(
          "$dbms->name does not support columns"
        ),

    }));

  }

}