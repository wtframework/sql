<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait FullText
{

  protected string $full_text = '';

  public function fullText(): static
  {

    $this->full_text = 'FULLTEXT';

    return $this;

  }

  protected function getFullText(): string
  {
    return $this->full_text;
  }

}