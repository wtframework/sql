<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait StatsAutoRecalc
{

  protected string $stats_auto_recalc = '';

  public function statsAutoRecalc(bool $value = true): static
  {

    $value = (int) $value;

    $this->stats_auto_recalc = "STATS_AUTO_RECALC $value";

    return $this;

  }

  public function statsAutoRecalcDefault(): static
  {

    $this->stats_auto_recalc = "STATS_AUTO_RECALC DEFAULT";

    return $this;

  }

  protected function getStatsAutoRecalc(): string
  {
    return $this->stats_auto_recalc;
  }

}