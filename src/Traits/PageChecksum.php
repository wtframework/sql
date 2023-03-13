<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait PageChecksum
{

  protected string $page_checksum = '';

  public function pageChecksum(bool $value = true): static
  {

    $value = (int) $value;

    $this->page_checksum = "PAGE_CHECKSUM $value";

    return $this;

  }

  protected function getPageChecksum(): string
  {
    return $this->page_checksum;
  }

}