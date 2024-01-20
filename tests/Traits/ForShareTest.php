<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can for share', function ()
{

  expect(
    (string) SQL::select()
    ->forShare()
  )
  ->toEqual('SELECT * FOR SHARE');

});

it('can for share of table', function ()
{

  expect(
    (string) SQL::select()
    ->forShare('test')
  )
  ->toEqual('SELECT * FOR SHARE OF test');

});

it('can for share of multiple tables', function ()
{

  expect(
    (string) SQL::select()
    ->forShare(['test1', 'test2'])
  )
  ->toEqual('SELECT * FOR SHARE OF test1, test2');

});

it('can for share nowait', function ()
{

  expect(
    (string) SQL::select()
    ->forShareNoWait()
  )
  ->toEqual('SELECT * FOR SHARE NOWAIT');

});

it('can for share of table nowait', function ()
{

  expect(
    (string) SQL::select()
    ->forShareNoWait('test')
  )
  ->toEqual('SELECT * FOR SHARE OF test NOWAIT');

});

it('can for share of multiple tables nowait', function ()
{

  expect(
    (string) SQL::select()
    ->forShareNoWait(['test1', 'test2'])
  )
  ->toEqual('SELECT * FOR SHARE OF test1, test2 NOWAIT');

});

it('can for share skip locked', function ()
{

  expect(
    (string) SQL::select()
    ->forShareSkipLocked()
  )
  ->toEqual('SELECT * FOR SHARE SKIP LOCKED');

});

it('can for share of table skip locked', function ()
{

  expect(
    (string) SQL::select()
    ->forShareSkipLocked('test')
  )
  ->toEqual('SELECT * FOR SHARE OF test SKIP LOCKED');

});

it('can for share of multiple tables skip locked', function ()
{

  expect(
    (string) SQL::select()
    ->forShareSkipLocked(['test1', 'test2'])
  )
  ->toEqual('SELECT * FOR SHARE OF test1, test2 SKIP LOCKED');

});