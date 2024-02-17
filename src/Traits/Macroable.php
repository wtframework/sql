<?php

declare(strict_types=1);

namespace WTFramework\SQL\Traits;

use BadMethodCallException;
use Closure;

trait Macroable
{

  protected static array $macros = [];

  public static function macro(string $name, Closure $callback): void
  {
    static::$macros[$name] = $callback;
  }

  protected static function call(
    string $name,
    array $arguments,
    self $self = null
  ): mixed
  {

    if (!$macro = static::$macros[$name] ?? null)
    {

      throw new BadMethodCallException(sprintf(
        'Call to undefined method %s::%s()', static::class, $name
      ));

    }

    return $macro->bindTo($self, static::class)(...$arguments);

  }

  public function __call(string $name, array $arguments): mixed
  {
    return static::call($name, $arguments, $this);
  }

  public static function __callStatic(string $name, array $arguments): mixed
  {
    return static::call($name, $arguments);
  }

}