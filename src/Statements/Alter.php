<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQLException;
use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\AddColumn;
use WTFramework\SQL\Traits\AddConstraint;
use WTFramework\SQL\Traits\AddIndex;
use WTFramework\SQL\Traits\AddPeriodForSystemTime;
use WTFramework\SQL\Traits\Algorithm;
use WTFramework\SQL\Traits\AllInTablespace;
use WTFramework\SQL\Traits\AlterPartition;
use WTFramework\SQL\Traits\AlterSet;
use WTFramework\SQL\Traits\AlterUnion;
use WTFramework\SQL\Traits\AttachPartition;
use WTFramework\SQL\Traits\AutoIncrement;
use WTFramework\SQL\Traits\AvgRowLength;
use WTFramework\SQL\Traits\Change;
use WTFramework\SQL\Traits\Charset;
use WTFramework\SQL\Traits\Checksum;
use WTFramework\SQL\Traits\ClusterOn;
use WTFramework\SQL\Traits\Comment;
use WTFramework\SQL\Traits\Connection;
use WTFramework\SQL\Traits\ConvertToCharset;
use WTFramework\SQL\Traits\DataDirectory;
use WTFramework\SQL\Traits\DelayKeyWrite;
use WTFramework\SQL\Traits\DetachPartition;
use WTFramework\SQL\Traits\DropColumn;
use WTFramework\SQL\Traits\DropConstraint;
use WTFramework\SQL\Traits\DropForeignKey;
use WTFramework\SQL\Traits\DropIndex;
use WTFramework\SQL\Traits\DropPrimaryKey;
use WTFramework\SQL\Traits\Encrypted;
use WTFramework\SQL\Traits\EncryptionKeyID;
use WTFramework\SQL\Traits\Engine;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\Force;
use WTFramework\SQL\Traits\ForValues;
use WTFramework\SQL\Traits\IETFQuotes;
use WTFramework\SQL\Traits\IfExists;
use WTFramework\SQL\Traits\Ignore;
use WTFramework\SQL\Traits\ImportTablespace;
use WTFramework\SQL\Traits\IndexDirectory;
use WTFramework\SQL\Traits\Inherit;
use WTFramework\SQL\Traits\InsertMethod;
use WTFramework\SQL\Traits\KeyBlockSize;
use WTFramework\SQL\Traits\Keys;
use WTFramework\SQL\Traits\Lock;
use WTFramework\SQL\Traits\MaxRows;
use WTFramework\SQL\Traits\MinRows;
use WTFramework\SQL\Traits\Modify;
use WTFramework\SQL\Traits\NoInherit;
use WTFramework\SQL\Traits\NotOf;
use WTFramework\SQL\Traits\Of;
use WTFramework\SQL\Traits\Online;
use WTFramework\SQL\Traits\OrderBy;
use WTFramework\SQL\Traits\OwnedBy;
use WTFramework\SQL\Traits\OwnerTo;
use WTFramework\SQL\Traits\PackKeys;
use WTFramework\SQL\Traits\PageChecksum;
use WTFramework\SQL\Traits\PageCompressed;
use WTFramework\SQL\Traits\PageCompressionLevel;
use WTFramework\SQL\Traits\Password;
use WTFramework\SQL\Traits\RenameColumn;
use WTFramework\SQL\Traits\RenameConstraint;
use WTFramework\SQL\Traits\RenameIndex;
use WTFramework\SQL\Traits\RenameTo;
use WTFramework\SQL\Traits\ReplicaIdentity;
use WTFramework\SQL\Traits\Reset;
use WTFramework\SQL\Traits\RowFormat;
use WTFramework\SQL\Traits\RowLevelSecurity;
use WTFramework\SQL\Traits\Rule;
use WTFramework\SQL\Traits\Sequence;
use WTFramework\SQL\Traits\SetAccessMethod;
use WTFramework\SQL\Traits\SetLogged;
use WTFramework\SQL\Traits\SetSchema;
use WTFramework\SQL\Traits\SetTablespace;
use WTFramework\SQL\Traits\SetWithoutCluster;
use WTFramework\SQL\Traits\StatsAutoRecalc;
use WTFramework\SQL\Traits\StatsPersistent;
use WTFramework\SQL\Traits\StatsSamplePages;
use WTFramework\SQL\Traits\SystemVersioning;
use WTFramework\SQL\Traits\Table;
use WTFramework\SQL\Traits\Tablespace;
use WTFramework\SQL\Traits\Transactional;
use WTFramework\SQL\Traits\Trigger;
use WTFramework\SQL\Traits\ValidateConstraint;
use WTFramework\SQL\Traits\Validation;
use WTFramework\SQL\Traits\Wait;
use WTFramework\SQL\Traits\WithSystemVersioning;

class Alter extends Statement
{

  use Explain;
  use Online;
  use Ignore;
  use IfExists;
  use AllInTablespace;
  use Table;
  use Wait;
  use OwnedBy;
  use RenameTo;
  use RenameColumn;
  use AddColumn;
  use AddConstraint;
  use AddIndex;
  use Modify;
  use Change;
  use DropColumn;
  use DropConstraint;
  use AddPeriodForSystemTime;
  use DropPrimaryKey;
  use DropIndex;
  use DropForeignKey;
  use Keys;
  use RenameIndex;
  use RenameConstraint;
  use ConvertToCharset;
  use ImportTablespace;
  use Algorithm;
  use Lock;
  use Force;
  use AlterPartition;
  use SystemVersioning;
  use Validation;
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
  use OrderBy;
  use SetSchema;
  use AttachPartition;
  use ForValues;
  use DetachPartition;
  use ValidateConstraint;
  use Trigger;
  use Rule;
  use RowLevelSecurity;
  use ClusterOn;
  use SetWithoutCluster;
  use SetAccessMethod;
  use SetTablespace;
  use SetLogged;
  use AlterSet;
  use Reset;
  use Inherit;
  use NoInherit;
  use Of;
  use NotOf;
  use OwnerTo;
  use ReplicaIdentity;

  protected function grammar(): array
  {

    return match ($dbms = $this->dbms)
    {

      DBMS::MariaDB => [
        'ALTER',
        $this->getOnline(),
        $this->getIgnore(),
        'TABLE',
        $this->getIfExists(),
        $this->getTable(),
        $this->getWait(),
        implode(', ', array_filter([
          $this->getRenameTo(),
          $this->getRenameColumn(),
          $this->getAddColumn(),
          $this->getAddConstraint(),
          $this->getAddIndex(),
          $this->getModify(),
          $this->getChange(),
          $this->getDropColumn(),
          $this->getAddPeriodForSystemTime(),
          $this->getDropPrimaryKey(),
          $this->getDropIndex(),
          $this->getDropForeignKey(),
          $this->getDropConstraint(),
          $this->getKeys(),
          $this->getRenameIndex(),
          $this->getConvertToCharset(),
          $this->getImportTablespace(),
          $this->getAlgorithm(),
          $this->getLock(),
          $this->getForce(),
          $this->getAlterPartition(),
          $this->getSystemVersioning(),
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
          $this->getOrderBy(),
        ])),
      ],

      DBMS::MySQL => [
        'ALTER',
        'TABLE',
        $this->getTable(),
        implode(', ', array_filter([
          $this->getRenameTo(),
          $this->getRenameColumn(),
          $this->getAddColumn(),
          $this->getAddConstraint(),
          $this->getAddIndex(),
          $this->getModify(),
          $this->getChange(),
          $this->getDropColumn(),
          $this->getDropPrimaryKey(),
          $this->getDropIndex(),
          $this->getDropForeignKey(),
          $this->getDropConstraint(),
          $this->getKeys(),
          $this->getRenameIndex(),
          $this->getConvertToCharset(),
          $this->getImportTablespace(),
          $this->getAlgorithm(),
          $this->getLock(),
          $this->getForce(),
          $this->getAlterPartition(),
          $this->getValidation(),
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
          $this->getOrderBy(),
        ])),
      ],

      DBMS::SQLite => [
        $this->getExplain(),
        'ALTER',
        'TABLE',
        $this->getTable(),
        $this->getRenameTo(),
        $this->getRenameColumn(),
        $this->getAddColumn(),
        $this->getDropColumn(),
      ],

      DBMS::PostgreSQL => [
        'ALTER',
        'TABLE',
        $this->getIfExists(),
        $this->getAllInTablespace(),
        $this->getTable(),
        $this->getOwnedBy(),
        $this->getRenameTo(),
        $this->getRenameColumn(),
        $this->getRenameConstraint(),
        $this->getSetSchema(),
        $this->getAttachPartition(),
        $this->getForValues(),
        $this->getDetachPartition(),
        implode(', ', array_filter([
          $this->getAddColumn(),
          $this->getAddConstraint(),
          $this->getDropColumn(),
          $this->getDropConstraint(),
          $this->getValidateConstraint(),
          $this->getTrigger(),
          $this->getRule(),
          $this->getRowLevelSecurity(),
          $this->getClusterOn(),
          $this->getSetWithoutCluster(),
          $this->getSetAccessMethod(),
          $this->getSetTablespace(),
          $this->getSetLogged(),
          $this->getAlterSet(),
          $this->getReset(),
          $this->getInherit(),
          $this->getNoInherit(),
          $this->getOf(),
          $this->getNotOf(),
          $this->getOwnerTo(),
          $this->getReplicaIdentity(),
        ])),
      ],

      DBMS::SQLServer => [
        $this->getExplain(),
        'ALTER',
        'TABLE',
        $this->getTable(),
        $this->getDropColumn(),
      ],

      default =>
        throw new SQLException(
          "$dbms->name does not support ALTER TABLE"
        ),

    };

  }

}