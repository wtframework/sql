<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can drop index', function ()
{

  expect(
    (string) SQL::alter()
    ->dropIndex('test1')
  )
  ->toEqual("ALTER TABLE DROP INDEX test1");

});

it('can drop multiple indexes', function ()
{

  expect(
    (string) SQL::alter()
    ->dropIndex(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE DROP INDEX test1, DROP INDEX test2"
  );

});

it('can drop index if exists', function ()
{

  expect(
    (string) SQL::alter()
    ->dropIndexIfExists('test1')
  )
  ->toEqual("ALTER TABLE DROP INDEX IF EXISTS test1");

});

it('can drop multiple indexes if exists', function ()
{

  expect(
    (string) SQL::alter()
    ->dropIndexIfExists(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE DROP INDEX IF EXISTS test1, DROP INDEX IF EXISTS test2"
  );

});