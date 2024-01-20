<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can for update', function ()
{

  expect(
    (string) SQL::select()
    ->forUpdate()
  )
  ->toEqual('SELECT * FOR UPDATE');

});

it('can for update of table', function ()
{

  expect(
    (string) SQL::select()
    ->forUpdate('test')
  )
  ->toEqual('SELECT * FOR UPDATE OF test');

});

it('can for update of multiple tables', function ()
{

  expect(
    (string) SQL::select()
    ->forUpdate(['test1', 'test2'])
  )
  ->toEqual('SELECT * FOR UPDATE OF test1, test2');

});

it('can for update wait', function ()
{

  expect(
    (string) SQL::select()
    ->forUpdateWait(10)
  )
  ->toEqual('SELECT * FOR UPDATE WAIT 10');

});

it('can for update nowait', function ()
{

  expect(
    (string) SQL::select()
    ->forUpdateNoWait()
  )
  ->toEqual('SELECT * FOR UPDATE NOWAIT');

});

it('can for update of table nowait', function ()
{

  expect(
    (string) SQL::select()
    ->forUpdateNoWait('test')
  )
  ->toEqual('SELECT * FOR UPDATE OF test NOWAIT');

});

it('can for update of multiple tables nowait', function ()
{

  expect(
    (string) SQL::select()
    ->forUpdateNoWait(['test1', 'test2'])
  )
  ->toEqual('SELECT * FOR UPDATE OF test1, test2 NOWAIT');

});

it('can for update skip locked', function ()
{

  expect(
    (string) SQL::select()
    ->forUpdateSkipLocked()
  )
  ->toEqual('SELECT * FOR UPDATE SKIP LOCKED');

});

it('can for update of table skip locked', function ()
{

  expect(
    (string) SQL::select()
    ->forUpdateSkipLocked('test')
  )
  ->toEqual('SELECT * FOR UPDATE OF test SKIP LOCKED');

});

it('can for update of multiple tables skip locked', function ()
{

  expect(
    (string) SQL::select()
    ->forUpdateSkipLocked(['test1', 'test2'])
  )
  ->toEqual('SELECT * FOR UPDATE OF test1, test2 SKIP LOCKED');

});