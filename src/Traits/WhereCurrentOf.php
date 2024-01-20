<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait WhereCurrentOf
{

  protected string $where_current_of = '';

  public function whereCurrentOf(string $cursor_name): static
  {

    $this->where_current_of = "WHERE CURRENT OF $cursor_name";

    return $this;

  }

  protected function getWhereCurrentOf(): string
  {
    return $this->where_current_of;
  }

}