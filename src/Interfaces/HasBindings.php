<?php

declare(strict_types=1);

namespace WTFramework\SQL\Interfaces;

interface HasBindings
{
  public function bindings(): array;
}