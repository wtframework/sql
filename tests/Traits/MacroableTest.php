<?php

declare(strict_types=1);

use WTFramework\SQL\Simple\Statements\Select;
use WTFramework\SQL\SQL;

it('can add macro to statement', function ()
{

  Select::macro('first', function (string $column)
  {

    return $this->orderBy($column)
    ->top(1)
    ->limit(1);

  });

  expect((string) SQL::select()->first('user_id'))
  ->toBe("SELECT * ORDER BY user_id LIMIT 1");

});

it('can add static macro to statement', function ()
{

  SQL::macro('count', function (string $table)
  {

    return static::select()
    ->column('COUNT(*) AS counter')
    ->from($table);

  });

  expect((string) SQL::count('users'))
  ->toBe("SELECT COUNT(*) AS counter FROM users");

});