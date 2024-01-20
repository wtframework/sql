<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

trait ProcedureAnalyse
{

  protected string $procedure_analyse = '';
  protected array $procedure_analyse_arguments = [];

  public function procedureAnalyse(
    int $max_elements = null,
    int $max_memory = null
  ): static
  {

    $this->procedure_analyse = 'PROCEDURE ANALYSE';

    if (null !== $max_elements)
    {

      $this->procedure_analyse_arguments = [$max_elements];

      if (null !== $max_memory)
      {
        $this->procedure_analyse_arguments[] = $max_memory;
      }

    }

    return $this;

  }

  protected function getProcedureAnalyse(): string
  {

    if ('' === $this->procedure_analyse)
    {
      return '';
    }

    $arguments = implode(', ', $this->procedure_analyse_arguments);

    return "$this->procedure_analyse ($arguments)";

  }

}