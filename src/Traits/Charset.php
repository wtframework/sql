<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Charset
{

  protected string $charset = '';
  protected string $collation = '';

  public function charset(string $charset): static
  {

    $this->charset = "CHARACTER SET $charset";

    return $this;

  }

  public function collate(string $collation): static
  {

    $this->collation = "COLLATE $collation";

    return $this;

  }

  protected function getCharset(): string
  {
    return trim("$this->charset $this->collation");
  }

}