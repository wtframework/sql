<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQLException;
use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\AlterUnion;
use WTFramework\SQL\Traits\AsFileTable;
use WTFramework\SQL\Traits\AsSelect;
use WTFramework\SQL\Traits\AutoIncrement;
use WTFramework\SQL\Traits\AvgRowLength;
use WTFramework\SQL\Traits\Charset;
use WTFramework\SQL\Traits\Check;
use WTFramework\SQL\Traits\Checksum;
use WTFramework\SQL\Traits\Comment;
use WTFramework\SQL\Traits\ConflictOr;
use WTFramework\SQL\Traits\Connection;
use WTFramework\SQL\Traits\Constraint;
use WTFramework\SQL\Traits\CreateColumn;
use WTFramework\SQL\Traits\CreateOn;
use WTFramework\SQL\Traits\CreatePartitionBy;
use WTFramework\SQL\Traits\CreateWith;
use WTFramework\SQL\Traits\DataDirectory;
use WTFramework\SQL\Traits\DelayKeyWrite;
use WTFramework\SQL\Traits\Encrypted;
use WTFramework\SQL\Traits\EncryptionKeyID;
use WTFramework\SQL\Traits\Engine;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\FilestreamOn;
use WTFramework\SQL\Traits\ForValues;
use WTFramework\SQL\Traits\IETFQuotes;
use WTFramework\SQL\Traits\IfNotExists;
use WTFramework\SQL\Traits\Ignore;
use WTFramework\SQL\Traits\Index;
use WTFramework\SQL\Traits\IndexDirectory;
use WTFramework\SQL\Traits\Inherits;
use WTFramework\SQL\Traits\InsertMethod;
use WTFramework\SQL\Traits\KeyBlockSize;
use WTFramework\SQL\Traits\Like;
use WTFramework\SQL\Traits\MaxRows;
use WTFramework\SQL\Traits\MinRows;
use WTFramework\SQL\Traits\Of;
use WTFramework\SQL\Traits\OnCommit;
use WTFramework\SQL\Traits\PackKeys;
use WTFramework\SQL\Traits\PageChecksum;
use WTFramework\SQL\Traits\PageCompressed;
use WTFramework\SQL\Traits\PageCompressionLevel;
use WTFramework\SQL\Traits\PartitionOf;
use WTFramework\SQL\Traits\Password;
use WTFramework\SQL\Traits\PeriodForSystemTime;
use WTFramework\SQL\Traits\Replace;
use WTFramework\SQL\Traits\RowFormat;
use WTFramework\SQL\Traits\Sequence;
use WTFramework\SQL\Traits\StatsAutoRecalc;
use WTFramework\SQL\Traits\StatsPersistent;
use WTFramework\SQL\Traits\StatsSamplePages;
use WTFramework\SQL\Traits\Strict;
use WTFramework\SQL\Traits\Table;
use WTFramework\SQL\Traits\Tablespace;
use WTFramework\SQL\Traits\Temporary;
use WTFramework\SQL\Traits\TextimageOn;
use WTFramework\SQL\Traits\Transactional;
use WTFramework\SQL\Traits\Unlogged;
use WTFramework\SQL\Traits\UsingMethod;
use WTFramework\SQL\Traits\WithNoData;
use WTFramework\SQL\Traits\WithoutRowID;
use WTFramework\SQL\Traits\WithSystemVersioning;

class Create extends Statement
{

  use Explain;
  use ConflictOr;
  use Temporary;
  use Unlogged;
  use IfNotExists;
  use Table;
  use CreateColumn;
  use Constraint;
  use Index;
  use Check;
  use Engine;
  use AutoIncrement;
  use AvgRowLength;
  use Charset;
  use Checksum;
  use Comment;
  use Connection;
  use DataDirectory;
  use DelayKeyWrite;
  use Encrypted;
  use EncryptionKeyID;
  use IETFQuotes;
  use IndexDirectory;
  use InsertMethod;
  use KeyBlockSize;
  use MaxRows;
  use MinRows;
  use PackKeys;
  use PageChecksum;
  use PageCompressed;
  use PageCompressionLevel;
  use Password;
  use RowFormat;
  use Sequence;
  use StatsAutoRecalc;
  use StatsPersistent;
  use StatsSamplePages;
  use Tablespace;
  use Transactional;
  use AlterUnion;
  use WithSystemVersioning;
  use Like;
  use Ignore;
  use Replace;
  use AsSelect;
  use AsFileTable;
  use Of;
  use PartitionOf;
  use ForValues;
  use Inherits;
  use CreatePartitionBy;
  use UsingMethod;
  use CreateWith;
  use OnCommit;
  use WithoutRowID;
  use Strict;
  use WithNoData;
  use PeriodForSystemTime;
  use CreateOn;
  use TextimageOn;
  use FilestreamOn;
  use PeriodForSystemTime;

  protected function grammar(): array
  {

    return match ($dbms = $this->dbms)
    {

      DBMS::MariaDB => [
        'CREATE',
        $this->getOr(),
        $this->getTemporary(),
        'TABLE',
        $this->getIfNotExists(),
        $this->getTable(),
        ($definition = implode(', ', array_filter([
          $this->getCreateColumn(),
          $this->getConstraint(', '),
          $this->getIndex(),
          $this->getCheck(),
          $this->getPeriodForSystemTime(),
        ]))) ? "($definition)" : '',
        $this->getEngine(),
        $this->getAutoIncrement(),
        $this->getAvgRowLength(),
        $this->getCharset(),
        $this->getChecksum(),
        $this->getComment(),
        $this->getConnection(),
        $this->getDataDirectory(),
        $this->getDelayKeyWrite(),
        $this->getEncrypted(),
        $this->getEncryptionKeyID(),
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
        $this->getSequence(),
        $this->getStatsAutoRecalc(),
        $this->getStatsPersistent(),
        $this->getStatsSamplePages(),
        $this->getTablespace(),
        $this->getTransactional(),
        $this->getAlterUnion(),
        $this->getWithSystemVersioning(),
        $this->getLike(),
        $this->getIgnore() ?: $this->getReplace(),
        $this->getAs(),
      ],

      DBMS::MySQL => [
        'CREATE',
        $this->getTemporary(),
        'TABLE',
        $this->getIfNotExists(),
        $this->getTable(),
        ($definition = implode(', ', array_filter([
          $this->getCreateColumn(),
          $this->getConstraint(', '),
          $this->getIndex(),
          $this->getCheck(),
        ]))) ? "($definition)" : '',
        $this->getEngine(),
        $this->getAutoIncrement(),
        $this->getAvgRowLength(),
        $this->getCharset(),
        $this->getChecksum(),
        $this->getComment(),
        $this->getConnection(),
        $this->getDataDirectory(),
        $this->getDelayKeyWrite(),
        $this->getIndexDirectory(),
        $this->getInsertMethod(),
        $this->getKeyBlockSize(),
        $this->getMaxRows(),
        $this->getMinRows(),
        $this->getPackKeys(),
        $this->getPassword(),
        $this->getRowFormat(),
        $this->getStatsAutoRecalc(),
        $this->getStatsPersistent(),
        $this->getStatsSamplePages(),
        $this->getTablespace(),
        $this->getTransactional(),
        $this->getAlterUnion(),
        $this->getLike(),
        $this->getIgnore() ?: $this->getReplace(),
        $this->getAs(),
      ],

      DBMS::SQLite => [
        $this->getExplain(),
        'CREATE',
        $this->getTemporary(),
        'TABLE',
        $this->getIfNotExists(),
        $this->getTable(),
        ($definition = implode(', ', array_filter([
          $this->getCreateColumn(),
          $this->getConstraint(', '),
          $this->getIndex(),
          $this->getCheck(),
        ]))) ? "($definition)" : '',
        $this->getAs(),
        $this->getWithoutRowID(),
        $this->getStrict(),
      ],

      DBMS::PostgreSQL => [
        $this->getExplain(),
        'CREATE',
        $this->getTemporary(),
        $this->getUnlogged(),
        'TABLE',
        $this->getIfNotExists(),
        $this->getTable(),
        $this->getOf(),
        $this->getPartitionOf(),
        ($definition = implode(', ', array_filter([
          $this->getCreateColumn(),
          $this->getConstraint(', '),
          $this->getIndex(),
          $this->getCheck(),
          $this->getLike(),
        ]))) ? "($definition)" : '',
        $this->getForValues(),
        $this->getInherits(),
        $this->getCreatePartitionBy(),
        $this->getUsingMethod(),
        $this->getCreateWith(),
        $this->getOnCommit(),
        $this->getTablespace(),
        $this->getAs(),
        $this->getWithNoData(),
      ],

      DBMS::SQLServer => [
        $this->getExplain(),
        'CREATE',
        'TABLE',
        $this->getTable(),
        $this->getAsFileTable(),
        ($definition = implode(', ', array_filter([
          $this->getPeriodForSystemTime(),
        ]))) ? "($definition)" : '()',
        $this->getCreateOn(),
        $this->getTextimageOn(),
        $this->getFilestreamOn(),
      ],

      default =>
        throw new SQLException(
          "$dbms->name does not support CREATE TABLE"
        ),

    };

  }

}