<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set statement variable for select', function ()
{

  expect(
    (string) SQL::select()
    ->setStatement('test', 1)
  )
  ->toEqual('SET STATEMENT test = 1 FOR SELECT *');

});

it('can set multiple statement variables for select', function ()
{

  expect(
    (string) SQL::select()
    ->setStatement([
      'test1' => 1,
      'test2' => 2,
    ])
  )
  ->toEqual('SET STATEMENT test1 = 1, test2 = 2 FOR SELECT *');

});