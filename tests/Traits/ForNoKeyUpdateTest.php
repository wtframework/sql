<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can for no key update', function ()
{

  expect(
    (string) SQL::select()
    ->forNoKeyUpdate()
  )
  ->toEqual('SELECT * FOR NO KEY UPDATE');

});

it('can for no key update of table', function ()
{

  expect(
    (string) SQL::select()
    ->forNoKeyUpdate('test')
  )
  ->toEqual('SELECT * FOR NO KEY UPDATE OF test');

});

it('can for no key update of multiple tables', function ()
{

  expect(
    (string) SQL::select()
    ->forNoKeyUpdate(['test1', 'test2'])
  )
  ->toEqual('SELECT * FOR NO KEY UPDATE OF test1, test2');

});

it('can for no key update nowait', function ()
{

  expect(
    (string) SQL::select()
    ->forNoKeyUpdateNoWait()
  )
  ->toEqual('SELECT * FOR NO KEY UPDATE NOWAIT');

});

it('can for no key update of table nowait', function ()
{

  expect(
    (string) SQL::select()
    ->forNoKeyUpdateNoWait('test')
  )
  ->toEqual('SELECT * FOR NO KEY UPDATE OF test NOWAIT');

});

it('can for no key update of multiple tables nowait', function ()
{

  expect(
    (string) SQL::select()
    ->forNoKeyUpdateNoWait(['test1', 'test2'])
  )
  ->toEqual('SELECT * FOR NO KEY UPDATE OF test1, test2 NOWAIT');

});

it('can for no key update skip locked', function ()
{

  expect(
    (string) SQL::select()
    ->forNoKeyUpdateSkipLocked()
  )
  ->toEqual('SELECT * FOR NO KEY UPDATE SKIP LOCKED');

});

it('can for no key update of table skip locked', function ()
{

  expect(
    (string) SQL::select()
    ->forNoKeyUpdateSkipLocked('test')
  )
  ->toEqual('SELECT * FOR NO KEY UPDATE OF test SKIP LOCKED');

});

it('can for no key update of multiple tables skip locked', function ()
{

  expect(
    (string) SQL::select()
    ->forNoKeyUpdateSkipLocked(['test1', 'test2'])
  )
  ->toEqual('SELECT * FOR NO KEY UPDATE OF test1, test2 SKIP LOCKED');

});