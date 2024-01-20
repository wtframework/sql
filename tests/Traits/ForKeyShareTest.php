<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can for key share', function ()
{

  expect(
    (string) SQL::select()
    ->forKeyShare()
  )
  ->toEqual('SELECT * FOR KEY SHARE');

});

it('can for key share of table', function ()
{

  expect(
    (string) SQL::select()
    ->forKeyShare('test')
  )
  ->toEqual('SELECT * FOR KEY SHARE OF test');

});

it('can for key share of multiple tables', function ()
{

  expect(
    (string) SQL::select()
    ->forKeyShare(['test1', 'test2'])
  )
  ->toEqual('SELECT * FOR KEY SHARE OF test1, test2');

});

it('can for key share nowait', function ()
{

  expect(
    (string) SQL::select()
    ->forKeyShareNoWait()
  )
  ->toEqual('SELECT * FOR KEY SHARE NOWAIT');

});

it('can for key share of table nowait', function ()
{

  expect(
    (string) SQL::select()
    ->forKeyShareNoWait('test')
  )
  ->toEqual('SELECT * FOR KEY SHARE OF test NOWAIT');

});

it('can for key share of multiple tables nowait', function ()
{

  expect(
    (string) SQL::select()
    ->forKeyShareNoWait(['test1', 'test2'])
  )
  ->toEqual('SELECT * FOR KEY SHARE OF test1, test2 NOWAIT');

});

it('can for key share skip locked', function ()
{

  expect(
    (string) SQL::select()
    ->forKeyShareSkipLocked()
  )
  ->toEqual('SELECT * FOR KEY SHARE SKIP LOCKED');

});

it('can for key share of table skip locked', function ()
{

  expect(
    (string) SQL::select()
    ->forKeyShareSkipLocked('test')
  )
  ->toEqual('SELECT * FOR KEY SHARE OF test SKIP LOCKED');

});

it('can for key share of multiple tables skip locked', function ()
{

  expect(
    (string) SQL::select()
    ->forKeyShareSkipLocked(['test1', 'test2'])
  )
  ->toEqual('SELECT * FOR KEY SHARE OF test1, test2 SKIP LOCKED');

});