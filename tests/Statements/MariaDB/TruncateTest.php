<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::MariaDB);

it('can truncate', function ()
{

  expect(
    (string) $this->sql->truncate()
    ->table('test')
  )
  ->toEqual('TRUNCATE TABLE test');

});

it('can truncate wait', function ()
{

  expect(
    (string) $this->sql->truncate()
    ->table('test')
    ->wait(10)
  )
  ->toEqual('TRUNCATE TABLE test WAIT 10');

});

it('can truncate no wait', function ()
{

  expect(
    (string) $this->sql->truncate()
    ->table('test')
    ->noWait()
  )
  ->toEqual('TRUNCATE TABLE test NOWAIT');

});