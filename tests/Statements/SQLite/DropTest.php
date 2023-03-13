<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::SQLite);

it('can drop', function ()
{

  expect(
    (string) $this->sql->drop()
    ->table('test')
  )
  ->toEqual('DROP TABLE test');

});

it('can explain drop', function ()
{

  expect(
    (string) $this->sql->drop()
    ->explain()
  )
  ->toEqual('EXPLAIN DROP TABLE');

});

it('can drop if exists', function ()
{

  expect(
    (string) $this->sql->drop()
    ->table('test')
    ->ifExists()
  )
  ->toEqual('DROP TABLE IF EXISTS test');

});