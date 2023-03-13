<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait TextimageOn
{

  protected string $textimage_on = '';

  public function textimageOn(string $filegroup): static
  {

    $this->textimage_on = "TEXTIMAGE_ON $filegroup";

    return $this;

  }

  protected function getTextimageOn(): string
  {
    return $this->textimage_on;
  }

}