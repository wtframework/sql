<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Algorithm
{

  protected string $algorithm = '';

  public function algorithmDefault(): static
  {

    $this->algorithm = 'ALGORITHM = DEFAULT';

    return $this;

  }

  public function algorithmInPlace(): static
  {

    $this->algorithm = 'ALGORITHM = INPLACE';

    return $this;

  }

  public function algorithmCopy(): static
  {

    $this->algorithm = 'ALGORITHM = COPY';

    return $this;

  }

  public function algorithmNoCopy(): static
  {

    $this->algorithm = 'ALGORITHM = NOCOPY';

    return $this;

  }

  public function algorithmInstant(): static
  {

    $this->algorithm = 'ALGORITHM = INSTANT';

    return $this;

  }

  protected function getAlgorithm(): string
  {
    return $this->algorithm;
  }

}