<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can drop foreign key', function ()
{

  expect(
    (string) SQL::alter()
    ->dropForeignKey('test1')
  )
  ->toEqual("ALTER TABLE DROP FOREIGN KEY test1");

});

it('can drop multiple foriegn key', function ()
{

  expect(
    (string) SQL::alter()
    ->dropForeignKey(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE DROP FOREIGN KEY test1, DROP FOREIGN KEY test2"
  );

});

it('can drop foreign key if exists', function ()
{

  expect(
    (string) SQL::alter()
    ->dropForeignKeyIfExists('test1')
  )
  ->toEqual("ALTER TABLE DROP FOREIGN KEY IF EXISTS test1");

});

it('can drop multiple foriegn key if exists', function ()
{

  expect(
    (string) SQL::alter()
    ->dropForeignKeyIfExists(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE DROP FOREIGN KEY IF EXISTS test1, "
  . "DROP FOREIGN KEY IF EXISTS test2"
  );

});