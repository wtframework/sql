<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Explain
{

  protected string $explain = '';

  public function explain(): static
  {

    $this->explain = 'EXPLAIN';

    return $this;

  }

  public function explainExtended(): static
  {

    $this->explain = 'EXPLAIN EXTENDED';

    return $this;

  }

  public function explainPartitions(): static
  {

    $this->explain = 'EXPLAIN PARTITIONS';

    return $this;

  }

  public function explainFormatJSON(): static
  {

    $this->explain = 'EXPLAIN FORMAT=JSON';

    return $this;

  }

  public function explainAnalyze(): static
  {

    $this->explain = 'EXPLAIN ANALYZE';

    return $this;

  }

  public function explainQueryPlan(): static
  {

    $this->explain = 'EXPLAIN QUERY PLAN';

    return $this;

  }

  protected function getExplain(): string
  {
    return $this->explain;
  }

}