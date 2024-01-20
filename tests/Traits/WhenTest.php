<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can add condition if true', function ()
{

  expect(
    (string) SQL::select()
    ->when(1, if_true: function ($sql, $int)
    {
      $sql->limit($int);
    })
  )
  ->toEqual("SELECT * LIMIT 1");

});

it('can add condition if false', function ()
{

  expect(
    (string) SQL::select()
    ->when(0, if_false: function ($sql, $int)
    {
      $sql->offset($int);
    })
  )
  ->toEqual("SELECT * OFFSET 0");

});