<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\Interfaces\HasBindings;
use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Distinct;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\Expression;
use WTFramework\SQL\Traits\FetchRows;
use WTFramework\SQL\Traits\ForKeyShare;
use WTFramework\SQL\Traits\ForNoKeyUpdate;
use WTFramework\SQL\Traits\ForShare;
use WTFramework\SQL\Traits\ForUpdate;
use WTFramework\SQL\Traits\From;
use WTFramework\SQL\Traits\GroupBy;
use WTFramework\SQL\Traits\Having;
use WTFramework\SQL\Traits\HighPriority;
use WTFramework\SQL\Traits\IfElse;
use WTFramework\SQL\Traits\Into;
use WTFramework\SQL\Traits\IntoDumpfile;
use WTFramework\SQL\Traits\IntoOutfile;
use WTFramework\SQL\Traits\IntoVar;
use WTFramework\SQL\Traits\Join;
use WTFramework\SQL\Traits\Limit;
use WTFramework\SQL\Traits\LockInShareMode;
use WTFramework\SQL\Traits\Offset;
use WTFramework\SQL\Traits\OffsetRows;
use WTFramework\SQL\Traits\OrderBy;
use WTFramework\SQL\Traits\ProcedureAnalyse;
use WTFramework\SQL\Traits\RowsExamined;
use WTFramework\SQL\Traits\SetOperation;
use WTFramework\SQL\Traits\SetStatement;
use WTFramework\SQL\Traits\SQLBigResult;
use WTFramework\SQL\Traits\SQLBufferResult;
use WTFramework\SQL\Traits\SQLCache;
use WTFramework\SQL\Traits\SQLCalcFoundRows;
use WTFramework\SQL\Traits\SQLSmallResult;
use WTFramework\SQL\Traits\StraightJoin;
use WTFramework\SQL\Traits\Top;
use WTFramework\SQL\Traits\ToSubquery;
use WTFramework\SQL\Traits\Values;
use WTFramework\SQL\Traits\Where;
use WTFramework\SQL\Traits\WhereCurrentOf;
use WTFramework\SQL\Traits\Window;
use WTFramework\SQL\Traits\With;

class Select extends Statement
{

  use Distinct;
  use Explain;
  use Expression;
  use FetchRows;
  use From;
  use ForKeyShare;
  use ForNoKeyUpdate;
  use ForShare;
  use ForUpdate;
  use GroupBy;
  use Having;
  use HighPriority;
  use IfElse;
  use Into;
  use IntoDumpfile;
  use IntoOutfile;
  use IntoVar;
  use Join;
  use Limit;
  use LockInShareMode;
  use Offset;
  use OffsetRows;
  use OrderBy;
  use ProcedureAnalyse;
  use RowsExamined;
  use SetOperation;
  use SetStatement;
  use SQLBigResult;
  use SQLBufferResult;
  use SQLCache;
  use SQLCalcFoundRows;
  use SQLSmallResult;
  use StraightJoin;
  use Top;
  use ToSubquery;
  use Values;
  use Where;
  use WhereCurrentOf;
  use Window;
  use With;

  public function __construct(string|HasBindings|array|null $table = null)
  {

    if ($table)
    {
      $this->from($table);
    }

  }

  protected function toArray(): array
  {

    return [
      $this->getIf(),
      $this->getSetStatement(),
      $this->getExplain(),
      $this->getWith(),
      $this->getValues() ?: implode(' ', array_filter([
        "SELECT",
        $this->getDistinct(),
        $this->getHighPriority(),
        $this->getStraightJoin(),
        $this->getSQLSmallResult(),
        $this->getSQLBigResult(),
        $this->getSQLBufferResult(),
        $this->getSQLCache(),
        $this->getSQLCalcFoundRows(),
        $this->getTop(),
        $this->getExpression(),
        $this->getInto(),
        $this->getFrom(),
        $this->getJoin(),
        $this->getWhere() ?: $this->getWhereCurrentOf(),
        $this->getGroupBy(),
        $this->getHaving(),
        $this->getWindow(),
      ])),
      $this->getSetOperation(),
      $this->getOrderBy(),
      $this->getLimit() ?: $this->getOffsetRows(),
      $this->getOffset() ?: $this->getFetchRows(),
      $this->getRowsExamined(),
      $this->getProcedureAnalyse(),
      $this->getForUpdate(),
      $this->getForNoKeyUpdate(),
      $this->getForShare() ?: $this->getLockInShareMode(),
      $this->getForKeyShare(),
      $this->getIntoOutfile() ?: $this->getIntoDumpfile() ?: $this->getIntoVar(),
      $this->getElse(),
    ];

  }

}