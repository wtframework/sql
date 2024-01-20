<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Algorithm;
use WTFramework\SQL\Traits\Clustered;
use WTFramework\SQL\Traits\Clustering;
use WTFramework\SQL\Traits\Column;
use WTFramework\SQL\Traits\Columnstore;
use WTFramework\SQL\Traits\ColumnUnique;
use WTFramework\SQL\Traits\Comment;
use WTFramework\SQL\Traits\Concurrently;
use WTFramework\SQL\Traits\CreateWith;
use WTFramework\SQL\Traits\EngineAttribute;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\FilestreamOn;
use WTFramework\SQL\Traits\FullText;
use WTFramework\SQL\Traits\IfElse;
use WTFramework\SQL\Traits\IfNotExists;
use WTFramework\SQL\Traits\Ignored;
use WTFramework\SQL\Traits\IncludeColumn;
use WTFramework\SQL\Traits\IndexType;
use WTFramework\SQL\Traits\KeyBlockSize;
use WTFramework\SQL\Traits\Lock;
use WTFramework\SQL\Traits\NullsDistinct;
use WTFramework\SQL\Traits\OnTable;
use WTFramework\SQL\Traits\OrReplace;
use WTFramework\SQL\Traits\SecondaryEngineAttribute;
use WTFramework\SQL\Traits\Spatial;
use WTFramework\SQL\Traits\Tablespace;
use WTFramework\SQL\Traits\UsingXMLIndex;
use WTFramework\SQL\Traits\Visibility;
use WTFramework\SQL\Traits\Wait;
use WTFramework\SQL\Traits\Where;
use WTFramework\SQL\Traits\WithParser;
use WTFramework\SQL\Traits\XML;

class CreateIndex extends Statement
{

  use Algorithm;
  use Clustering;
  use Clustered;
  use Column;
  use Columnstore;
  use ColumnUnique;
  use Comment;
  use Concurrently;
  use CreateWith;
  use EngineAttribute;
  use Explain;
  use FilestreamOn;
  use FullText;
  use IfElse;
  use IfNotExists;
  use Ignored;
  use IncludeColumn;
  use IndexType;
  use KeyBlockSize;
  use Lock;
  use NullsDistinct;
  use OnTable;
  use OrReplace;
  use SecondaryEngineAttribute;
  use Spatial;
  use Tablespace;
  use UsingXMLIndex;
  use Visibility;
  use Wait;
  use Where;
  use WithParser;
  use XML;

  public function __construct(protected readonly string $index) {}

  protected function toArray(): array
  {

    return [
      $this->getIf(),
      $this->getExplain(),
      "CREATE",
      $this->getOrReplace(),
      $this->getUnique() ?: $this->getFullText() ?: $this->getXML() ?: $this->getSpatial(),
      $this->getClustered(),
      $this->getColumnstore(),
      "INDEX",
      $this->getConcurrently(),
      $this->getIfNotExists(),
      $this->index,
      $this->getUsing(),
      $this->getOn(),
      $this->getColumn(),
      $this->getWait(),
      $this->getKeyBlockSize(),
      $this->getWithParser(),
      $this->getComment(),
      $this->getClustering(),
      $this->getIgnored(),
      $this->getVisibility(),
      $this->getEngineAttribute(),
      $this->getSecondaryEngineAttribute(),
      $this->getAlgorithm(),
      $this->getLock(),
      $this->getInclude(),
      $this->getNullsDistinct(),
      $this->getWith(),
      $this->getTablespace(),
      $this->getWhere(),
      $this->getUsingXMLIndex(),
      $this->getFilestreamOn(),
      $this->getElse(),
    ];

  }

}