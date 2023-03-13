<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;
use WTFramework\SQL\SQL;

it('can select column', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->column('test')
  )
  ->toEqual('SELECT test');

});

it('can select multiple columns', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->column(['test1', 'test2'])
  )
  ->toEqual('SELECT test1, test2');

});

it('can select bound value', function ()
{

  expect(
    (string) $stmt = DBMS::MariaDB->select()
    ->column(SQL::bind('test'))
  )
  ->toEqual('SELECT ?');

  expect($stmt->bindings())
  ->toEqual([[
    'value' => 'test',
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can select bound var', function ()
{

  expect(
    (string) $stmt = DBMS::MariaDB->select()
    ->column(SQL::bindVar($test))
  )
  ->toEqual('SELECT ?');

  $test = 'test';

  expect($stmt->bindings())
  ->toEqual([[
    'var' => 'test',
    'type' => \PDO::PARAM_STR,
    'maxLength' => 0,
    'driverOptions' => null,
  ]]);

});

it('can select subquery', function ()
{

  expect(
    (string) $stmt = DBMS::MariaDB->select()
    ->column(SQL::subquery(
      DBMS::MariaDB->select()
      ->column(SQL::bind('test1')),
      'test2'
    ))
  )
  ->toEqual('SELECT (SELECT ?) AS test2');

  expect($stmt->bindings())
  ->toEqual([[
    'value' => 'test1',
    'type' => \PDO::PARAM_STR,
  ]]);

});

it('can select sql small result', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->sqlSmallResult()
  )
  ->toEqual('SELECT SQL_SMALL_RESULT *');

});

it('can select sql big result', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->sqlBigResult()
  )
  ->toEqual('SELECT SQL_BIG_RESULT *');

});

it('can select sql buffer result', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->sqlBufferResult()
  )
  ->toEqual('SELECT SQL_BUFFER_RESULT *');

});

it('can select from table', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->from('test')
  )
  ->toEqual('SELECT * FROM test');

});

it('can select from multiple tables', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->from(['test1', 'test2'])
  )
  ->toEqual('SELECT * FROM test1, test2');

});

it('can select from table partition', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->from(
      SQL::table(
        'test1',
        'test2'
      )
      ->partition(['p1', 'p2'])
    )
  )
  ->toEqual('SELECT * FROM test1 PARTITION (p1, p2) AS test2');

});

it('can select window string', function ()
{

  expect(
    (string) DBMS::MySQL->select()
    ->window('w', 'PARTITION BY test')
  )
  ->toEqual('SELECT * WINDOW w AS (PARTITION BY test)');

});

it('can select window object', function ()
{

  expect(
    (string) DBMS::MySQL->select()
    ->window('w', SQL::window())
  )
  ->toEqual('SELECT * WINDOW w AS ()');

});

it('can select group by', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->groupBy('test')
  )
  ->toEqual('SELECT * GROUP BY test');

});

it('can select group by multiple columns', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->groupBy(['test1', 'test2'])
  )
  ->toEqual('SELECT * GROUP BY test1, test2');

});

it('can select group by with rollup', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->groupByWithRollup('test')
  )
  ->toEqual('SELECT * GROUP BY test WITH ROLLUP');

});

it('can select union', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->union('SELECT *')
  )
  ->toEqual('SELECT * UNION SELECT *');

});

it('can select union all', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->unionAll('SELECT *')
  )
  ->toEqual('SELECT * UNION ALL SELECT *');

});

it('can select intersect', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->intersect('SELECT *')
  )
  ->toEqual('SELECT * INTERSECT SELECT *');

});

it('can select intersect all', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->intersectAll('SELECT *')
  )
  ->toEqual('SELECT * INTERSECT ALL SELECT *');

});

it('can select except', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->except('SELECT *')
  )
  ->toEqual('SELECT * EXCEPT SELECT *');

});

it('can select except all', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->exceptAll('SELECT *')
  )
  ->toEqual('SELECT * EXCEPT ALL SELECT *');

});

it('can select order by', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->orderBy('test')
  )
  ->toEqual('SELECT * ORDER BY test ASC');

});

it('can select order by multiple columns', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->orderBy(['test1', 'test2'])
  )
  ->toEqual('SELECT * ORDER BY test1 ASC, test2 ASC');

});

it('can select order by desc', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->orderByDesc('test')
  )
  ->toEqual('SELECT * ORDER BY test DESC');

});

it('can select order by multiple columns desc', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->orderByDesc(['test1', 'test2'])
  )
  ->toEqual('SELECT * ORDER BY test1 DESC, test2 DESC');

});

it('can select limit', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->limit(10)
  )
  ->toEqual('SELECT * LIMIT 10');

});

it('can select limit offset', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->limit(10, 10)
  )
  ->toEqual('SELECT * LIMIT 10 OFFSET 10');

});

it('can select fetch rows', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->fetch(10)
  )
  ->toEqual('SELECT * FETCH NEXT 10 ROWS ONLY');

});

it('can select fetch rows with ties', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->fetchWithTies(10)
  )
  ->toEqual('SELECT * FETCH NEXT 10 ROWS WITH TIES');

});

it('can select offset fetch', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->fetch(10, 10)
  )
  ->toEqual('SELECT * OFFSET 10 ROWS FETCH NEXT 10 ROWS ONLY');

});

it('can select with for update', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forUpdate()
  )
  ->toEqual('SELECT * FOR UPDATE');

});

it('can select with for update of table', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forUpdate('test')
  )
  ->toEqual('SELECT * FOR UPDATE OF test');

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forUpdate(['test1', 'test2'])
  )
  ->toEqual('SELECT * FOR UPDATE OF test1, test2');

});

it('can select with for update nowait', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forUpdateNoWait()
  )
  ->toEqual('SELECT * FOR UPDATE NOWAIT');

});

it('can select with for update wait', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forUpdateWait(10)
  )
  ->toEqual('SELECT * FOR UPDATE WAIT 10');

});

it('can select with for update skip locked', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forUpdateSkipLocked()
  )
  ->toEqual('SELECT * FOR UPDATE SKIP LOCKED');

});

it('can select with for no key update', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forNoKeyUpdate()
  )
  ->toEqual('SELECT * FOR NO KEY UPDATE');

});

it('can select with for no key update of table', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forNoKeyUpdate('test')
  )
  ->toEqual('SELECT * FOR NO KEY UPDATE OF test');

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forNoKeyUpdate(['test1', 'test2'])
  )
  ->toEqual('SELECT * FOR NO KEY UPDATE OF test1, test2');

});

it('can select with for no key update nowait', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forNoKeyUpdateNoWait()
  )
  ->toEqual('SELECT * FOR NO KEY UPDATE NOWAIT');

});

it('can select with for no key update skip locked', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forNoKeyUpdateSkipLocked()
  )
  ->toEqual('SELECT * FOR NO KEY UPDATE SKIP LOCKED');

});

it('can select with for share', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forShare()
  )
  ->toEqual('SELECT * FOR SHARE');

});

it('can select with for share of table', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forShare('test')
  )
  ->toEqual('SELECT * FOR SHARE OF test');

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forShare(['test1', 'test2'])
  )
  ->toEqual('SELECT * FOR SHARE OF test1, test2');

});

it('can select with for share nowait', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forShareNoWait()
  )
  ->toEqual('SELECT * FOR SHARE NOWAIT');

});

it('can select with for share skip locked', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forShareSkipLocked()
  )
  ->toEqual('SELECT * FOR SHARE SKIP LOCKED');

});

it('can select with for key share', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forKeyShare()
  )
  ->toEqual('SELECT * FOR KEY SHARE');

});

it('can select with for key share of table', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forKeyShare('test')
  )
  ->toEqual('SELECT * FOR KEY SHARE OF test');

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forKeyShare(['test1', 'test2'])
  )
  ->toEqual('SELECT * FOR KEY SHARE OF test1, test2');

});

it('can select with for key share nowait', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forKeyShareNoWait()
  )
  ->toEqual('SELECT * FOR KEY SHARE NOWAIT');

});

it('can select with for key share skip locked', function ()
{

  expect(
    (string) DBMS::PostgreSQL->select()
    ->forKeyShareSkipLocked()
  )
  ->toEqual('SELECT * FOR KEY SHARE SKIP LOCKED');

});

it('can select with lock in share mode', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->lockInShareMode()
  )
  ->toEqual('SELECT * LOCK IN SHARE MODE');

});

it('can select with lock in share mode wait', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->lockInShareModeWait(10)
  )
  ->toEqual('SELECT * LOCK IN SHARE MODE WAIT 10');

});

it('can select with lock in share mode nowait', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->lockInShareModeNoWait()
  )
  ->toEqual('SELECT * LOCK IN SHARE MODE NOWAIT');

});

it('can select with lock in share mode skip locked', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
    ->lockInShareModeSkipLocked()
  )
  ->toEqual('SELECT * LOCK IN SHARE MODE SKIP LOCKED');

});