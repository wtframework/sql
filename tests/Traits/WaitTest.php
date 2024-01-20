<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can wait', function ()
{

  expect(
    (string) SQL::truncate()
    ->wait(10)
  )
  ->toEqual('TRUNCATE TABLE WAIT 10');

});

it('can nowait', function ()
{

  expect(
    (string) SQL::truncate()
    ->noWait()
  )
  ->toEqual('TRUNCATE TABLE NOWAIT');

});