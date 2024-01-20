<?php

declare(strict_types=1);

namespace WTFramework\SQL\Interfaces;

interface HasBindings
{
  public function mergeBindings(HasBindings $from): void;
  public function bindings(): array;
  public function __toString(): string;
}