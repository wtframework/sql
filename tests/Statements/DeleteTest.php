<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

it('can delete using', function ()
{

  expect(
    (string) DBMS::MariaDB->delete()
    ->from('test1')
    ->using('test2')
  )
  ->toEqual('DELETE FROM test1 USING test2');

});

it('can delete using multiple tables', function ()
{

  expect(
    (string) DBMS::MariaDB->delete()
    ->from('test1')
    ->using(['test2', 'test3'])
  )
  ->toEqual('DELETE FROM test1 USING test2, test3');

});

it('can delete returning all', function ()
{

  expect(
    (string) DBMS::MariaDB->delete()
    ->from('test')
    ->returning()
  )
  ->toEqual('DELETE FROM test RETURNING *');

});

it('can delete returning columns', function ()
{

  expect(
    (string) DBMS::MariaDB->delete()
    ->from('test')
    ->returning(['test1', 'test2'])
  )
  ->toEqual('DELETE FROM test RETURNING test1, test2');

});