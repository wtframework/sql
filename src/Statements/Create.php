<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\AsSelect;
use WTFramework\SQL\Traits\AutoExtendSize;
use WTFramework\SQL\Traits\AutoIncrement;
use WTFramework\SQL\Traits\AvgRowLength;
use WTFramework\SQL\Traits\CharacterSet;
use WTFramework\SQL\Traits\Check;
use WTFramework\SQL\Traits\Checksum;
use WTFramework\SQL\Traits\Collate;
use WTFramework\SQL\Traits\Comment;
use WTFramework\SQL\Traits\Compression;
use WTFramework\SQL\Traits\Connection;
use WTFramework\SQL\Traits\Constraint;
use WTFramework\SQL\Traits\CreateColumn;
use WTFramework\SQL\Traits\CreateDataType;
use WTFramework\SQL\Traits\CreateIndex;
use WTFramework\SQL\Traits\CreateWith;
use WTFramework\SQL\Traits\DataDirectory;
use WTFramework\SQL\Traits\DelayKeyWrite;
use WTFramework\SQL\Traits\Encrypted;
use WTFramework\SQL\Traits\Encryption;
use WTFramework\SQL\Traits\EncryptionKeyID;
use WTFramework\SQL\Traits\Engine;
use WTFramework\SQL\Traits\EngineAttribute;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\ForValues;
use WTFramework\SQL\Traits\IETFQuotes;
use WTFramework\SQL\Traits\IfElse;
use WTFramework\SQL\Traits\IfNotExists;
use WTFramework\SQL\Traits\Ignore;
use WTFramework\SQL\Traits\IndexDirectory;
use WTFramework\SQL\Traits\Inherits;
use WTFramework\SQL\Traits\InsertMethod;
use WTFramework\SQL\Traits\KeyBlockSize;
use WTFramework\SQL\Traits\Like;
use WTFramework\SQL\Traits\MaxRows;
use WTFramework\SQL\Traits\MinRows;
use WTFramework\SQL\Traits\Of;
use WTFramework\SQL\Traits\OnCommit;
use WTFramework\SQL\Traits\OrReplace;
use WTFramework\SQL\Traits\PackKeys;
use WTFramework\SQL\Traits\PageChecksum;
use WTFramework\SQL\Traits\PageCompressed;
use WTFramework\SQL\Traits\PageCompressionLevel;
use WTFramework\SQL\Traits\Partition;
use WTFramework\SQL\Traits\PartitionBy;
use WTFramework\SQL\Traits\PartitionOf;
use WTFramework\SQL\Traits\Partitions;
use WTFramework\SQL\Traits\Password;
use WTFramework\SQL\Traits\PeriodForSystemTime;
use WTFramework\SQL\Traits\PrimaryKey;
use WTFramework\SQL\Traits\Replace;
use WTFramework\SQL\Traits\RowFormat;
use WTFramework\SQL\Traits\SecondaryEngineAttribute;
use WTFramework\SQL\Traits\Sequence;
use WTFramework\SQL\Traits\StartTransaction;
use WTFramework\SQL\Traits\StatsAutoRecalc;
use WTFramework\SQL\Traits\StatsPersistent;
use WTFramework\SQL\Traits\StatsSamplePages;
use WTFramework\SQL\Traits\Storage;
use WTFramework\SQL\Traits\Strict;
use WTFramework\SQL\Traits\SubpartitionBy;
use WTFramework\SQL\Traits\Subpartitions;
use WTFramework\SQL\Traits\Table;
use WTFramework\SQL\Traits\Tablespace;
use WTFramework\SQL\Traits\TableUnion;
use WTFramework\SQL\Traits\Temporary;
use WTFramework\SQL\Traits\Transactional;
use WTFramework\SQL\Traits\Unique;
use WTFramework\SQL\Traits\Unlogged;
use WTFramework\SQL\Traits\Using;
use WTFramework\SQL\Traits\WithoutRowID;
use WTFramework\SQL\Traits\WithSystemVersioning;

class Create extends Statement
{

  use AsSelect;
  use AutoExtendSize;
  use AutoIncrement;
  use AvgRowLength;
  use CharacterSet;
  use Check;
  use Checksum;
  use Collate;
  use Comment;
  use Compression;
  use Connection;
  use Constraint;
  use CreateColumn;
  use CreateDataType;
  use CreateIndex;
  use CreateWith;
  use DataDirectory;
  use DelayKeyWrite;
  use Encrypted;
  use Encryption;
  use EncryptionKeyID;
  use Engine;
  use EngineAttribute;
  use Explain;
  use ForValues;
  use IETFQuotes;
  use IfElse;
  use IfNotExists;
  use Ignore;
  use IndexDirectory;
  use Inherits;
  use InsertMethod;
  use KeyBlockSize;
  use Like;
  use MaxRows;
  use MinRows;
  use Of;
  use OnCommit;
  use OrReplace;
  use PackKeys;
  use PageChecksum;
  use PageCompressed;
  use PageCompressionLevel;
  use Partition;
  use PartitionOf;
  use Partitions;
  use PartitionBy;
  use Password;
  use PeriodForSystemTime;
  use PrimaryKey;
  use Replace;
  use RowFormat;
  use SecondaryEngineAttribute;
  use Sequence;
  use StartTransaction;
  use StatsAutoRecalc;
  use StatsPersistent;
  use StatsSamplePages;
  use Storage;
  use Strict;
  use SubpartitionBy;
  use Subpartitions;
  use Table;
  use Tablespace;
  use TableUnion;
  use Temporary;
  use Transactional;
  use Unique;
  use Unlogged;
  use Using;
  use WithoutRowID;
  use WithSystemVersioning;

  protected function toArray(): array
  {

    return [
      $this->getIf(),
      $this->getExplain(),
      "CREATE",
      $this->getOrReplace(),
      $this->getTemporary() ?: $this->getUnlogged(),
      "TABLE",
      $this->getIfNotExists(),
      $this->getTable(),
      $this->getOf() ?: $this->getPartitionOf(),
      ($definition = implode(', ', array_filter([
        $this->getColumn(),
        $this->getConstraint(),
        $this->getPrimaryKey(),
        $this->getUnique(),
        $this->getIndex(),
        $this->getPeriodForSystemTime(),
        $this->getCheck(),
      ]))) ? "($definition)" : '',
      $this->getAutoExtendSize(),
      $this->getAutoIncrement(),
      $this->getAvgRowLength(),
      $this->getCharacterSet(),
      $this->getChecksum(),
      $this->getCollate(),
      $this->getComment(),
      $this->getCompression(),
      $this->getConnection(),
      $this->getDataDirectory(),
      $this->getDelayKeyWrite(),
      $this->getEncrypted(),
      $this->getEncryption(),
      $this->getEncryptionKeyID(),
      $this->getEngine(),
      $this->getEngineAttribute(),
      $this->getIETFQuotes(),
      $this->getIndexDirectory(),
      $this->getInsertMethod(),
      $this->getKeyBlockSize(),
      $this->getMaxRows(),
      $this->getMinRows(),
      $this->getPackKeys(),
      $this->getPageChecksum(),
      $this->getPageCompressed(),
      $this->getPageCompressionLevel(),
      $this->getPassword(),
      $this->getRowFormat(),
      $this->getSecondaryEngineAttribute(),
      $this->getSequence(),
      $this->getStartTransaction(),
      $this->getStatsAutoRecalc(),
      $this->getStatsPersistent(),
      $this->getStatsSamplePages(),
      $this->getStorage(),
      $this->getTablespace(),
      $this->getTransactional(),
      $this->getUnion(),
      $this->getWithSystemVersioning(),
      $this->getInherits(),
      $this->getForValues(),
      $this->getPartitionBy(),
      $this->getPartitions(),
      $this->getSubpartitionBy(),
      $this->getSubpartitions(),
      $this->getPartition(),
      $this->getIgnore() ?: $this->getReplace(),
      $this->getAs(),
      $this->getLike(),
      $this->getUsing(),
      $this->getOnCommit(),
      $this->getWith(),
      implode(', ', array_filter([
        $this->getWithoutRowID(),
        $this->getStrict(),
      ])),
      $this->getElse(),
    ];

  }

}