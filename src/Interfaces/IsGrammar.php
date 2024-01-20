<?php

declare(strict_types=1);

namespace WTFramework\SQL\Interfaces;

interface IsGrammar
{

  /**
   * If true then LIMIT will be ignored otherwise TOP will be ignored
   */
  public function useTop(): bool;

  /**
   * The text to use for INSERT and REPLACE when no values are provided
   */
  public function defaultValues(): string;

  /**
   * Whether or not the RETURNING clause precedes the ORDER BY clause in a DELETE statement
   */
  public function deleteReturningBeforeOrderBy(): bool;

  /**
   * The text to use to define an auto increment column
   */
  public function autoIncrement(): string;

}