<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::PostgreSQL);

it('can truncate', function ()
{

  expect(
    (string) $this->sql->truncate()
    ->table('test')
  )
  ->toEqual('TRUNCATE TABLE test');

});

it('can truncate restart identity', function ()
{

  expect(
    (string) $this->sql->truncate()
    ->table('test')
    ->restartIdentity()
  )
  ->toEqual('TRUNCATE TABLE test RESTART IDENTITY');

});

it('can truncate cascade', function ()
{

  expect(
    (string) $this->sql->truncate()
    ->table('test')
    ->cascade()
  )
  ->toEqual('TRUNCATE TABLE test CASCADE');

});