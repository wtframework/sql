<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\AddColumn;
use WTFramework\SQL\Traits\AddConstraint;
use WTFramework\SQL\Traits\AddIndex;
use WTFramework\SQL\Traits\AddPartition;
use WTFramework\SQL\Traits\AddPeriodForSystemTime;
use WTFramework\SQL\Traits\Algorithm;
use WTFramework\SQL\Traits\AllInTablespace;
use WTFramework\SQL\Traits\AlterColumn;
use WTFramework\SQL\Traits\AlterConstraint;
use WTFramework\SQL\Traits\AlterIndex;
use WTFramework\SQL\Traits\AlterPartition;
use WTFramework\SQL\Traits\AttachPartition;
use WTFramework\SQL\Traits\AutoExtendSize;
use WTFramework\SQL\Traits\AutoIncrement;
use WTFramework\SQL\Traits\AvgRowLength;
use WTFramework\SQL\Traits\Change;
use WTFramework\SQL\Traits\CharacterSet;
use WTFramework\SQL\Traits\Checksum;
use WTFramework\SQL\Traits\ClusterOn;
use WTFramework\SQL\Traits\Collate;
use WTFramework\SQL\Traits\Comment;
use WTFramework\SQL\Traits\Compression;
use WTFramework\SQL\Traits\Connection;
use WTFramework\SQL\Traits\ConvertTable;
use WTFramework\SQL\Traits\ConvertToCharacterSet;
use WTFramework\SQL\Traits\DataDirectory;
use WTFramework\SQL\Traits\DelayKeyWrite;
use WTFramework\SQL\Traits\DetachPartition;
use WTFramework\SQL\Traits\DropColumn;
use WTFramework\SQL\Traits\DropConstraint;
use WTFramework\SQL\Traits\DropForeignKey;
use WTFramework\SQL\Traits\DropIndex;
use WTFramework\SQL\Traits\DropPrimaryKey;
use WTFramework\SQL\Traits\Encrypted;
use WTFramework\SQL\Traits\Encryption;
use WTFramework\SQL\Traits\EncryptionKeyID;
use WTFramework\SQL\Traits\Engine;
use WTFramework\SQL\Traits\EngineAttribute;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\Force;
use WTFramework\SQL\Traits\ForValues;
use WTFramework\SQL\Traits\IETFQuotes;
use WTFramework\SQL\Traits\IfElse;
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
use WTFramework\SQL\Traits\NotOf;
use WTFramework\SQL\Traits\Of;
use WTFramework\SQL\Traits\Online;
use WTFramework\SQL\Traits\Only;
use WTFramework\SQL\Traits\OrderBy;
use WTFramework\SQL\Traits\OwnedBy;
use WTFramework\SQL\Traits\OwnerTo;
use WTFramework\SQL\Traits\PackKeys;
use WTFramework\SQL\Traits\PageChecksum;
use WTFramework\SQL\Traits\PageCompressed;
use WTFramework\SQL\Traits\PageCompressionLevel;
use WTFramework\SQL\Traits\Partition;
use WTFramework\SQL\Traits\PartitionBy;
use WTFramework\SQL\Traits\Partitions;
use WTFramework\SQL\Traits\Password;
use WTFramework\SQL\Traits\RenameColumn;
use WTFramework\SQL\Traits\RenameConstraint;
use WTFramework\SQL\Traits\RenameIndex;
use WTFramework\SQL\Traits\RenameTo;
use WTFramework\SQL\Traits\ReorganizePartition;
use WTFramework\SQL\Traits\ReplicaIdentity;
use WTFramework\SQL\Traits\Reset;
use WTFramework\SQL\Traits\RowFormat;
use WTFramework\SQL\Traits\RowLevelSecurity;
use WTFramework\SQL\Traits\Rule;
use WTFramework\SQL\Traits\SecondaryEngineAttribute;
use WTFramework\SQL\Traits\Sequence;
use WTFramework\SQL\Traits\SetAccessMethod;
use WTFramework\SQL\Traits\SetLogged;
use WTFramework\SQL\Traits\SetParam;
use WTFramework\SQL\Traits\SetSchema;
use WTFramework\SQL\Traits\SetTablespace;
use WTFramework\SQL\Traits\SetWithoutCluster;
use WTFramework\SQL\Traits\StartTransaction;
use WTFramework\SQL\Traits\StatsAutoRecalc;
use WTFramework\SQL\Traits\StatsPersistent;
use WTFramework\SQL\Traits\StatsSamplePages;
use WTFramework\SQL\Traits\Storage;
use WTFramework\SQL\Traits\SubpartitionBy;
use WTFramework\SQL\Traits\Subpartitions;
use WTFramework\SQL\Traits\SystemVersioning;
use WTFramework\SQL\Traits\Table;
use WTFramework\SQL\Traits\Tablespace;
use WTFramework\SQL\Traits\TableUnion;
use WTFramework\SQL\Traits\Transactional;
use WTFramework\SQL\Traits\Trigger;
use WTFramework\SQL\Traits\ValidateConstraint;
use WTFramework\SQL\Traits\Wait;
use WTFramework\SQL\Traits\WithSystemVersioning;
use WTFramework\SQL\Traits\WithValidation;

class Alter extends Statement
{

  use AddColumn;
  use AddConstraint;
  use AddIndex;
  use AddPartition;
  use AddPeriodForSystemTime;
  use Algorithm;
  use AllInTablespace;
  use AlterColumn;
  use AlterConstraint;
  use AlterIndex;
  use AlterPartition;
  use AttachPartition;
  use AutoExtendSize;
  use AutoIncrement;
  use AvgRowLength;
  use Change;
  use CharacterSet;
  use Checksum;
  use ClusterOn;
  use Collate;
  use Comment;
  use Compression;
  use Connection;
  use ConvertTable;
  use ConvertToCharacterSet;
  use DataDirectory;
  use DelayKeyWrite;
  use DetachPartition;
  use DropColumn;
  use DropConstraint;
  use DropForeignKey;
  use DropIndex;
  use DropPrimaryKey;
  use Encrypted;
  use Encryption;
  use EncryptionKeyID;
  use Engine;
  use EngineAttribute;
  use Explain;
  use Force;
  use ForValues;
  use IETFQuotes;
  use IfElse;
  use IfExists;
  use Ignore;
  use ImportTablespace;
  use IndexDirectory;
  use Inherit;
  use InsertMethod;
  use KeyBlockSize;
  use Keys;
  use Lock;
  use MaxRows;
  use MinRows;
  use Modify;
  use NotOf;
  use Of;
  use Online;
  use Only;
  use OrderBy;
  use OwnedBy;
  use OwnerTo;
  use PackKeys;
  use PageChecksum;
  use PageCompressed;
  use PageCompressionLevel;
  use Partition;
  use PartitionBy;
  use Partitions;
  use Password;
  use RenameColumn;
  use RenameConstraint;
  use RenameIndex;
  use RenameTo;
  use ReorganizePartition;
  use ReplicaIdentity;
  use Reset;
  use RowFormat;
  use RowLevelSecurity;
  use Rule;
  use SecondaryEngineAttribute;
  use Sequence;
  use SetAccessMethod;
  use SetLogged;
  use SetParam;
  use SetSchema;
  use SetTablespace;
  use SetWithoutCluster;
  use StartTransaction;
  use StatsAutoRecalc;
  use StatsPersistent;
  use StatsSamplePages;
  use Storage;
  use SubpartitionBy;
  use Subpartitions;
  use SystemVersioning;
  use Table;
  use Tablespace;
  use TableUnion;
  use Transactional;
  use Trigger;
  use ValidateConstraint;
  use Wait;
  use WithSystemVersioning;
  use WithValidation;

  public function __construct(string|HasBindings|null $table = null)
  {

    if ($table)
    {
      $this->table($table);
    }

  }

  protected function toArray(): array
  {

    return [
      $this->getIf(),
      $this->getExplain(),
      "ALTER",
      $this->getOnline(),
      $this->getIgnore(),
      "TABLE",
      $this->getIfExists(),
      $this->getOnly(),
      $this->getAllInTablespace(),
      $this->getTable(),
      $this->getSetSchema(),
      $this->getOwnedBy(),
      $this->getAttachPartition(),
      $this->getForValues(),
      $this->getDetachPartition(),
      $this->getWait(),
      implode(', ', array_filter([
        $this->getAddColumn(),
        $this->getAddConstraint(),
        $this->getAddIndex(),
        $this->getChange(),
        $this->getModify(),
        $this->getRenameColumn(),
        $this->getRenameConstraint(),
        $this->getRenameIndex(),
        $this->getRenameTo(),
        $this->getDropColumn(),
        $this->getDropConstraint(),
        $this->getDropIndex(),
        $this->getDropPrimaryKey(),
        $this->getDropForeignKey(),
        $this->getAddPeriodForSystemTime(),
        $this->getAlgorithm(),
        $this->getAlterColumn(),
        $this->getAlterConstraint(),
        $this->getAlterIndex(),
        $this->getConvertToCharacterSet(),
        $this->getForce(),
        $this->getImportTablespace(),
        $this->getKeys(),
        $this->getLock(),
        $this->getSystemVersioning(),
        $this->getWithValidation(),
        $this->getClusterOn(),
        $this->getInherit(),
        $this->getNotOf(),
        $this->getOf(),
        $this->getOwnerTo(),
        $this->getReplicaIdentity(),
        $this->getReset(),
        $this->getRowLevelSecurity(),
        $this->getRule(),
        $this->getSetAccessMethod(),
        $this->getSetLogged(),
        $this->getSetParam(),
        $this->getSetTablespace(),
        $this->getSetWithoutCluster(),
        $this->getTrigger(),
        $this->getValidateConstraint(),
        implode(' ', array_filter([
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
          $this->getTablespace(),
          $this->getStorage(),
          $this->getTransactional(),
          $this->getUnion(),
          $this->getWithSystemVersioning(),
          $this->getConvertTable(),
          $this->getAddPartition(),
          $this->getReorganizePartition(),
          $this->getAlterPartition(),
          $this->getPartitionBy(),
          $this->getPartitions(),
          $this->getSubpartitionBy(),
          $this->getSubpartitions(),
          $this->getPartition(),
        ])),
        $this->getOrderBy(),
      ])),
      $this->getElse(),
    ];

  }

}