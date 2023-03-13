<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ConvertToCharset
{

  protected string $convert_to_charset = '';
  protected string $convert_to_collation = '';

  public function convertToCharset(
    string $charset,
    string $collation = null
  ): static
  {

    $this->convert_to_charset = "CONVERT TO CHARACTER SET $charset";

    if ($collation)
    {
      $this->convert_to_collation = " COLLATE $collation";
    }

    return $this;

  }

  protected function getConvertToCharset(): string
  {
    return "$this->convert_to_charset$this->convert_to_collation";
  }

}