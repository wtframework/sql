<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::MariaDB);

it('can drop', function ()
{

  expect(
    (string) $this->sql->drop()
    ->table('test')
  )
  ->toEqual('DROP TABLE test');

});

it('can drop temporary', function ()
{

  expect(
    (string) $this->sql->drop()
    ->table('test')
    ->temporary()
  )
  ->toEqual('DROP TEMPORARY TABLE test');

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

it('can drop wait', function ()
{

  expect(
    (string) $this->sql->drop()
    ->table('test')
    ->wait(10)
  )
  ->toEqual('DROP TABLE test WAIT 10');

});

it('can drop no wait', function ()
{

  expect(
    (string) $this->sql->drop()
    ->table('test')
    ->noWait()
  )
  ->toEqual('DROP TABLE test NOWAIT');

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