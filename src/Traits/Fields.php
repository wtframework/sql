<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use WTFramework\SQL\SQL;

trait Fields
{

  protected array $fields = [];

  public function fieldsTerminatedBy(string $string): static
  {

    $string = SQL::escape($string);

    $this->fields['terminated_by'] = "TERMINATED BY '$string'";

    return $this;

  }

  public function fieldsEnclosedBy(
    string $string,
    bool $optionally = false
  ): static
  {

    $type = $optionally ? 'OPTIONALLY ' : '';

    $string = SQL::escape($string);

    $this->fields['enclosed_by'] = "{$type}ENCLOSED BY '$string'";

    return $this;

  }

  public function fieldsOptionallyEnclosedBy(string $string): static
  {

    return $this->fieldsEnclosedBy(
      string: $string,
      optionally: true
    );

  }

  public function fieldsEscapedBy(string $string): static
  {

    $string = SQL::escape($string);

    $this->fields['escaped_by'] = "ESCAPED BY '$string'";

    return $this;

  }

  protected function getFields(): string
  {

    if (empty($this->fields))
    {
      return '';
    }

    $fields = implode(' ', $this->fields);

    return "FIELDS $fields";

  }

}