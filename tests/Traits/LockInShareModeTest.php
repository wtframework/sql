<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can lock in share mode', function ()
{

  expect(
    (string) SQL::select()
    ->lockInShareMode()
  )
  ->toEqual('SELECT * LOCK IN SHARE MODE');

});

it('can lock in share mode wait', function ()
{

  expect(
    (string) SQL::select()
    ->lockInShareModeWait(10)
  )
  ->toEqual('SELECT * LOCK IN SHARE MODE WAIT 10');

});

it('can lock in share mode nowait', function ()
{

  expect(
    (string) SQL::select()
    ->lockInShareModeNoWait()
  )
  ->toEqual('SELECT * LOCK IN SHARE MODE NOWAIT');

});

it('can lock in share mode skip locked', function ()
{

  expect(
    (string) SQL::select()
    ->lockInShareModeSkipLocked()
  )
  ->toEqual('SELECT * LOCK IN SHARE MODE SKIP LOCKED');

});