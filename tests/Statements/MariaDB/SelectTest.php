<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::MariaDB);

it('can select all', function ()
{

  expect(
    (string) $this->sql->select()
  )
  ->toEqual('SELECT *');

});

it('can explain select', function ()
{

  expect(
    (string) $this->sql->select()
    ->explain()
  )
  ->toEqual('EXPLAIN SELECT *');

});

it('can select from table', function ()
{

  expect(
    (string) $this->sql->select()
    ->from('test')
  )
  ->toEqual('SELECT * FROM test');

});

it('can select with cte', function ()
{

  expect(
    (string) $this->sql->select()
    ->with('cte AS (SELECT 1 UNION SELECT 2)')
  )
  ->toEqual('WITH cte AS (SELECT 1 UNION SELECT 2) SELECT *');

});

it('can select distinct', function ()
{

  expect(
    (string) $this->sql->select()
    ->distinct()
  )
  ->toEqual('SELECT DISTINCT *');

});

it('can select high priority', function ()
{

  expect(
    (string) $this->sql->select()
    ->highPriority()
  )
  ->toEqual('SELECT HIGH_PRIORITY *');

});

it('can select straight join all', function ()
{

  expect(
    (string) $this->sql->select()
    ->straightJoinAll()
  )
  ->toEqual('SELECT STRAIGHT_JOIN *');

});

it('can select sql small result', function ()
{

  expect(
    (string) $this->sql->select()
    ->sqlSmallResult()
  )
  ->toEqual('SELECT SQL_SMALL_RESULT *');

});

it('can select sql cache', function ()
{

  expect(
    (string) $this->sql->select()
    ->sqlCache()
  )
  ->toEqual('SELECT SQL_CACHE *');

});

it('can select sql no cache', function ()
{

  expect(
    (string) $this->sql->select()
    ->sqlNoCache()
  )
  ->toEqual('SELECT SQL_NO_CACHE *');

});

it('can select sql calc found rows', function ()
{

  expect(
    (string) $this->sql->select()
    ->sqlCalcFoundRows()
  )
  ->toEqual('SELECT SQL_CALC_FOUND_ROWS *');

});

it('can select into outfile', function ()
{

  expect(
    (string) $this->sql->select()
    ->intoOutfile('/tmp/test.txt')
  )
  ->toEqual("SELECT * INTO OUTFILE '/tmp/test.txt'");

});

it('can select into dumpfile', function ()
{

  expect(
    (string) $this->sql->select()
    ->intoDumpfile('/tmp/test.txt')
  )
  ->toEqual("SELECT * INTO DUMPFILE '/tmp/test.txt'");

});

it('can select into var', function ()
{

  expect(
    (string) $this->sql->select()
    ->intoVar('test')
  )
  ->toEqual("SELECT * INTO @test");

});

it('can select join', function ()
{

  expect(
    (string) $this->sql->select()
    ->from('test1')
    ->join('test2')
  )
  ->toEqual('SELECT * FROM test1 JOIN test2');

});

it('can select where', function ()
{

  expect(
    (string) $this->sql->select()
    ->where('test', 1)
  )
  ->toEqual('SELECT * WHERE test = ?');

});

it('can select group by', function ()
{

  expect(
    (string) $this->sql->select()
    ->groupBy('test')
  )
  ->toEqual('SELECT * GROUP BY test');

});

it('can select having', function ()
{

  expect(
    (string) $this->sql->select()
    ->having('test', 1)
  )
  ->toEqual('SELECT * HAVING test = ?');

});

it('can select union', function ()
{

  expect(
    (string) $this->sql->select()
    ->union('SELECT *')
  )
  ->toEqual('SELECT * UNION SELECT *');

});

it('can select intersect', function ()
{

  expect(
    (string) $this->sql->select()
    ->intersect('SELECT *')
  )
  ->toEqual('SELECT * INTERSECT SELECT *');

});

it('can select except', function ()
{

  expect(
    (string) $this->sql->select()
    ->except('SELECT *')
  )
  ->toEqual('SELECT * EXCEPT SELECT *');

});

it('can select order by', function ()
{

  expect(
    (string) $this->sql->select()
    ->orderBy('test')
  )
  ->toEqual('SELECT * ORDER BY test ASC');

});

it('can select limit', function ()
{

  expect(
    (string) $this->sql->select()
    ->limit(10)
  )
  ->toEqual('SELECT * LIMIT 10');

});

it('can select fetch rows', function ()
{

  expect(
    (string) $this->sql->select()
    ->fetch(10)
  )
  ->toEqual('SELECT * FETCH NEXT 10 ROWS ONLY');

});

it('can select rows examined', function ()
{

  expect(
    (string) $this->sql->select()
    ->rowsExamined(10)
  )
  ->toEqual('SELECT * ROWS EXAMINED 10');

});

it('can select procedure', function ()
{

  expect(
    (string) $this->sql->select()
    ->procedure('ANALYSE')
  )
  ->toEqual('SELECT * PROCEDURE ANALYSE ()');

});

it('can select procedure with argument', function ()
{

  expect(
    (string) $this->sql->select()
    ->procedure('ANALYSE', 10)
  )
  ->toEqual('SELECT * PROCEDURE ANALYSE (10)');

});

it('can select procedure with multiple arguments', function ()
{

  expect(
    (string) $this->sql->select()
    ->procedure('ANALYSE', [10, 2000])
  )
  ->toEqual('SELECT * PROCEDURE ANALYSE (10, 2000)');

});

it('can select for update', function ()
{

  expect(
    (string) $this->sql->select()
    ->forUpdate()
  )
  ->toEqual('SELECT * FOR UPDATE');

});

it('can select lock in share mode', function ()
{

  expect(
    (string) $this->sql->select()
    ->lockInShareMode()
  )
  ->toEqual('SELECT * LOCK IN SHARE MODE');

});