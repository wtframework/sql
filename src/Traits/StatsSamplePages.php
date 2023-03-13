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

  protected function getStatsSamplePages(): string
  {
    return $this->stats_sample_pages;
  }

}