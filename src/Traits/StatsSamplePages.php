<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait StatsSamplePages
{

  protected string $stats_sample_pages = '';

  public function statsSamplePages(int $value): static
  {

    $this->stats_sample_pages = "STATS_SAMPLE_PAGES $value";

    return $this;

  }

  public function statsSamplePagesDefault(): static
  {

    $this->stats_auto_recalc = "STATS_SAMPLE_PAGES DEFAULT";

    return $this;

  }

  protected function getStatsSamplePages(): string
  {
    return $this->stats_sample_pages;
  }

}