<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait SQLCalcFoundRows
{

  protected string $sql_calc_found_rows = '';

  public function sqlCalcFoundRows(): static
  {

    $this->sql_calc_found_rows = 'SQL_CALC_FOUND_ROWS';

    return $this;

  }

  protected function getSQLCalcFoundRows(): string
  {
    return $this->sql_calc_found_rows;
  }

}