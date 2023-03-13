<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::PostgreSQL);

it('can drop', function ()
{

  expect(
    (string) $this->sql->drop()
    ->table('test')
  )
  ->toEqual('DROP TABLE test');

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

it('can drop cascade', function ()
{

  expect(
    (string) $this->sql->drop()
    ->table('test')
    ->cascade()
  )
  ->toEqual('DROP TABLE test CASCADE');

});