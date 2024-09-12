<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can add index', function ()
{

  expect(
    (string) SQL::alter()
    ->addIndex('test')
  )
  ->toEqual("ALTER TABLE ADD INDEX (test)");

});

it('can add names index', function ()
{

  expect(
    (string) SQL::alter()
    ->addIndex('test', 'i1')
  )
  ->toEqual("ALTER TABLE ADD INDEX i1 (test)");

});

it('can add composite indexes', function ()
{

  expect(
    (string) SQL::alter()
    ->addIndex(['test1', 'test2'])
  )
  ->toEqual("ALTER TABLE ADD INDEX (test1, test2)");

});

it('can add index service', function ()
{

  expect(
    (string) SQL::alter()
    ->addIndex(SQL::index('test'))
  )
  ->toEqual("ALTER TABLE ADD INDEX (test)");

});