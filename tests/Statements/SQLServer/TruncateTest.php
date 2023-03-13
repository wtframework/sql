<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::SQLServer);

it('can truncate', function ()
{

  expect(
    (string) $this->sql->truncate()
    ->table('test')
  )
  ->toEqual('TRUNCATE TABLE test');

});

it('can explain truncate', function ()
{

  expect(
    (string) $this->sql->truncate()
    ->explain()
  )
  ->toEqual('EXPLAIN TRUNCATE TABLE');

});