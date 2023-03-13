<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait InsertMethod
{

  protected string $insert_method = '';

  public function insertMethodNo(): static
  {

    $this->insert_method = 'INSERT_METHOD NO';

    return $this;

  }

  public function insertMethodFirst(): static
  {

    $this->insert_method = 'INSERT_METHOD FIRST';

    return $this;

  }

  public function insertMethodLast(): static
  {

    $this->insert_method = 'INSERT_METHOD LAST';

    return $this;

  }

  protected function getInsertMethod(): string
  {
    return $this->insert_method;
  }

}