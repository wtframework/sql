<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can cycle', function ()
{

  expect(
    (string) SQL::cte('test1', 'test2')
    ->cycle('test3')
    ->set('test4')
    ->to('test5')
    ->default('test6')
    ->using('test7')
  )
  ->toEqual(
    "test1 AS (test2) "
  . "CYCLE test3 "
  . "SET test4 "
  . "TO test5 "
  . "DEFAULT test6 "
  . "USING test7"
  );

});

it('can cycle multiple columns', function ()
{

  expect(
    (string) SQL::cte('test1', 'test2')
    ->cycle(['test3', 'test4'])
  )
  ->toEqual('test1 AS (test2) CYCLE test3, test4');

});