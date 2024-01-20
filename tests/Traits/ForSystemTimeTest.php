<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can get table for system time as of', function ()
{

  expect(
    (string) SQL::table('t1')
    ->forSystemTimeAsOf('test1')
  )
  ->toEqual('t1 FOR SYSTEM_TIME AS OF test1');

});

it('can get table for system time between', function ()
{

  expect(
    (string) SQL::table('t1')
    ->forSystemTimeBetween('test1', 'test2')
  )
  ->toEqual('t1 FOR SYSTEM_TIME BETWEEN test1 AND test2');

});

it('can get table for system time from', function ()
{

  expect(
    (string) SQL::table('t1')
    ->forSystemTimeFrom('test1', 'test2')
  )
  ->toEqual('t1 FOR SYSTEM_TIME FROM test1 TO test2');

});

it('can get table for system time all', function ()
{

  expect(
    (string) SQL::table('t1')
    ->forSystemTimeAll()
  )
  ->toEqual('t1 FOR SYSTEM_TIME ALL');

});

it('can get table for system time as of bound value', function ()
{

  expect(
    (string) $table = SQL::table('t1')
    ->forSystemTimeAsOf(SQL::bind('test1'))
  )
  ->toEqual('t1 FOR SYSTEM_TIME AS OF ?');

  expect($table->bindings())
  ->toEqual(['test1']);

});