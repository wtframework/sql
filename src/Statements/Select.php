<?php

declare(strict_types=1);

namespace WTFramework\SQL\Statements;

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQLException;
use WTFramework\SQL\Statement;
use WTFramework\SQL\Traits\Distinct;
use WTFramework\SQL\Traits\Except;
use WTFramework\SQL\Traits\Explain;
use WTFramework\SQL\Traits\Expression;
use WTFramework\SQL\Traits\Fetch;
use WTFramework\SQL\Traits\ForKeyShare;
use WTFramework\SQL\Traits\ForNoKeyUpdate;
use WTFramework\SQL\Traits\ForShare;
use WTFramework\SQL\Traits\ForUpdate;
use WTFramework\SQL\Traits\From;
use WTFramework\SQL\Traits\GroupBy;
use WTFramework\SQL\Traits\Having;
use WTFramework\SQL\Traits\Intersect;
use WTFramework\SQL\Traits\Into;
use WTFramework\SQL\Traits\IntoDumpfile;
use WTFramework\SQL\Traits\IntoOutfile;
use WTFramework\SQL\Traits\IntoVar;
use WTFramework\SQL\Traits\Join;
use WTFramework\SQL\Traits\Limit;
use WTFramework\SQL\Traits\LockInShareMode;
use WTFramework\SQL\Traits\OrderBy;
use WTFramework\SQL\Traits\Priority;
use WTFramework\SQL\Traits\Procedure;
use WTFramework\SQL\Traits\RowsExamined;
use WTFramework\SQL\Traits\SQLCache;
use WTFramework\SQL\Traits\SQLCalcFoundRows;
use WTFramework\SQL\Traits\SQLResult;
use WTFramework\SQL\Traits\StraightJoinAll;
use WTFramework\SQL\Traits\Top;
use WTFramework\SQL\Traits\Union;
use WTFramework\SQL\Traits\Where;
use WTFramework\SQL\Traits\Window;
use WTFramework\SQL\Traits\With;

class Select extends Statement
{

  use Explain;
  use With;
  use Distinct;
  use Priority;
  use StraightJoinAll;
  use SQLResult;
  use SQLCache;
  use SQLCalcFoundRows;
  use Top;
  use Expression;
  use IntoOutfile;
  use IntoDumpfile;
  use IntoVar;
  use Into;
  use From;
  use Join;
  use Where;
  use GroupBy;
  use Having;
  use Window;
  use Union;
  use Intersect;
  use Except;
  use OrderBy;
  use Limit;
  use Fetch;
  use RowsExamined;
  use Procedure;
  use ForUpdate;
  use ForShare;
  use ForNoKeyUpdate;
  use ForKeyShare;
  use LockInShareMode;

  protected function grammar(): array
  {

    return match ($dbms = $this->dbms)
    {

      DBMS::MariaDB => [
        $this->getExplain(),
        $this->getWith(),
        'SELECT',
        $this->getDistinct(),
        $this->getPriority(),
        $this->getStraightJoinAll(),
        $this->getSQLResult(),
        $this->getSQLCache(),
        $this->getSQLCalcFoundRows(),
        $this->getExpression(),
        $this->getIntoOutfile(),
        $this->getIntoDumpfile(),
        $this->getIntoVar(),
        $this->getFrom(),
        $this->getJoin(),
        $this->getWhere(),
        $this->getGroupBy(),
        $this->getHaving(),
        $this->getUnion(),
        $this->getIntersect(),
        $this->getExcept(),
        $this->getOrderBy(),
        $this->getLimit() ?: $this->getFetch(),
        $this->getRowsExamined(),
        $this->getProcedure(),
        $this->getForUpdate(),
        $this->getLockInShareMode(),
      ],

      DBMS::MySQL => [
        $this->getExplain(),
        $this->getWith(),
        'SELECT',
        $this->getDistinct(),
        $this->getPriority(),
        $this->getStraightJoinAll(),
        $this->getSQLResult(),
        $this->getExpression(),
        $this->getFrom(),
        $this->getJoin(),
        $this->getWhere(),
        $this->getGroupBy(),
        $this->getHaving(),
        $this->getWindow(),
        $this->getUnion(),
        $this->getIntersect(),
        $this->getExcept(),
        $this->getOrderBy(),
        $this->getLimit(),
        $this->getForUpdate(),
        $this->getForShare(),
        $this->getLockInShareMode(),
        $this->getIntoOutfile(),
        $this->getIntoDumpfile(),
        $this->getIntoVar(),
      ],

      DBMS::SQLite => [
        $this->getExplain(),
        $this->getWith(),
        'SELECT',
        $this->getDistinct(),
        $this->getExpression(),
        $this->getFrom(),
        $this->getJoin(),
        $this->getWhere(),
        $this->getGroupBy(),
        $this->getHaving(),
        $this->getWindow(),
        $this->getUnion(),
        $this->getIntersect(),
        $this->getExcept(),
        $this->getOrderBy(),
        $this->getLimit(),
      ],

      DBMS::PostgreSQL => [
        $this->getExplain(),
        $this->getWith(),
        'SELECT',
        $this->getDistinct(),
        $this->getExpression(),
        $this->getFrom(),
        $this->getJoin(),
        $this->getWhere(),
        $this->getGroupBy(),
        $this->getHaving(),
        $this->getWindow(),
        $this->getUnion(),
        $this->getIntersect(),
        $this->getExcept(),
        $this->getOrderBy(),
        $this->getLimit() ?: $this->getFetch(),
        $this->getForUpdate(),
        $this->getForNoKeyUpdate(),
        $this->getForKeyShare(),
        $this->getForShare(),
      ],

      DBMS::SQLServer => [
        $this->getExplain(),
        $this->getWith(),
        'SELECT',
        $this->getDistinct(),
        $this->getTop(),
        $this->getExpression(),
        $this->getInto(),
        $this->getFrom(),
        $this->getJoin(),
        $this->getWhere(),
        $this->getGroupBy(),
        $this->getHaving(),
        $this->getWindow(),
        $this->getUnion(),
        $this->getIntersect(),
        $this->getExcept(),
        $this->getOrderBy(),
        $this->getFetch(),
      ],

      default =>
        throw new SQLException(
          "$dbms->name does not support SELECT"
        ),

    };

  }

}