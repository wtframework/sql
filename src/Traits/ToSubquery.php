<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Services\Subquery;

trait ToSubquery
{

  public function toSubquery(): Subquery
  {
    return new Subquery($this);
  }

}