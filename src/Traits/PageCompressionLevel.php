<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait PageCompressionLevel
{

  protected string $page_compression_level = '';

  public function pageCompressionLevel(int $value): static
  {

    $this->page_compression_level = "PAGE_COMPRESSION_LEVEL = $value";

    return $this;

  }

  protected function getPageCompressionLevel(): string
  {
    return $this->page_compression_level;
  }

}