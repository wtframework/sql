<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait Comment
{

  protected string $comment = '';

  public function comment(string $comment): static
  {

    $comment = str_replace("'", "''", $comment);

    $this->comment = "COMMENT '$comment'";

    return $this;

  }

  protected function getComment(): string
  {
    return $this->comment;
  }

}