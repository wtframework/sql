<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait RowLevelSecurity
{

  protected string $row_level_security = '';

  public function disableRowLevelSecurity(): static
  {

    $this->row_level_security = 'DISABLE ROW LEVEL SECURITY';

    return $this;

  }

  public function enableRowLevelSecurity(): static
  {

    $this->row_level_security = 'ENABLE ROW LEVEL SECURITY';

    return $this;

  }

  public function forceRowLevelSecurity(): static
  {

    $this->row_level_security = 'FORCE ROW LEVEL SECURITY';

    return $this;

  }

  public function noForceRowLevelSecurity(): static
  {

    $this->row_level_security = 'NO FORCE ROW LEVEL SECURITY';

    return $this;

  }

  protected function getRowLevelSecurity(): string
  {
    return $this->row_level_security;
  }

}