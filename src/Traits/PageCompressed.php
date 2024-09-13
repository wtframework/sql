<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait PageCompressed
{

  protected string $page_compressed = '';

  public function pageCompressed(bool $value = true): static
  {

    $value = (int) $value;

    $this->page_compressed = "PAGE_COMPRESSED = $value";

    return $this;

  }

  protected function getPageCompressed(): string
  {
    return $this->page_compressed;
  }

}