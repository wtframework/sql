<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\Interfaces\HasBindings;

trait OnConflictUpsert
{

  protected array $upsert = [];

  public function onConflict(string|HasBindings|array $upsert): static
  {

    $upserts = is_array($upsert) ? $upsert : [$upsert];

    foreach ($upserts as $upsert)
    {
      $this->upsert[] = $upsert;
    }

    return $this;

  }

  protected function getOnConflictUpsert(): string
  {

    if (empty($this->upsert))
    {
      return '';
    }

    $upsert = implode(' ON CONFLICT ', $this->upsert);

    foreach ($this->upsert as $u)
    {

      if ($u instanceof HasBindings)
      {
        $this->mergeBindings($u);
      }

    }

    return "ON CONFLICT $upsert";

  }

}