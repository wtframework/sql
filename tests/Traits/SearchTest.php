<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can search by breadth', function ()
{

  expect(
    (string) SQL::cte('test1', 'test2')
    ->searchBreadth('test3', 'test4')
  )
  ->toEqual('test1 AS (test2) SEARCH BREADTH FIRST BY test3 SET test4');

});

it('can search by breadth multiple columns', function ()
{

  expect(
    (string) SQL::cte('test1', 'test2')
    ->searchBreadth(['test3', 'test4'], 'test5')
  )
  ->toEqual('test1 AS (test2) SEARCH BREADTH FIRST BY test3, test4 SET test5');

});

it('can search by depth', function ()
{

  expect(
    (string) SQL::cte('test1', 'test2')
    ->searchDepth('test3', 'test4')
  )
  ->toEqual('test1 AS (test2) SEARCH DEPTH FIRST BY test3 SET test4');

});

it('can search by depth multiple columns', function ()
{

  expect(
    (string) SQL::cte('test1', 'test2')
    ->searchDepth(['test3', 'test4'], 'test5')
  )
  ->toEqual('test1 AS (test2) SEARCH DEPTH FIRST BY test3, test4 SET test5');

});