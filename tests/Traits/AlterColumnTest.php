<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can alter column set default', function ()
{

  expect(
    (string) $stmt = SQL::alter()
    ->columnSetDefault('test', 'test')
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test SET DEFAULT (?)");

  expect($stmt->bindings())
  ->toEqual(['test']);

});

it('can alter multiple columns set default', function ()
{

  expect(
    (string) $stmt = SQL::alter()
    ->columnSetDefault(['test1', 'test2'], 'test')
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 SET DEFAULT (?), "
  . "ALTER COLUMN test2 SET DEFAULT (?)"
  );

  expect($stmt->bindings())
  ->toEqual(['test', 'test']);

});

it('can alter column set default integer', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetDefault('test', 1)
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test SET DEFAULT (1)");

});

it('can alter multiple columns set default integer', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetDefault(['test1', 'test2'], 1)
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 SET DEFAULT (1), "
  . "ALTER COLUMN test2 SET DEFAULT (1)"
  );

});

it('can alter column set default raw value', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetDefault('test', SQL::raw('test'))
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test SET DEFAULT (test)");

});

it('can alter multiple columns set default raw value', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetDefault(['test1', 'test2'], SQL::raw('test'))
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 SET DEFAULT (test), "
  . "ALTER COLUMN test2 SET DEFAULT (test)"
  );

});

it('can alter column drop default', function ()
{

  expect(
    (string) SQL::alter()
    ->columnDropDefault('test')
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test DROP DEFAULT");

});

it('can alter multiple columns drop default', function ()
{

  expect(
    (string) SQL::alter()
    ->columnDropDefault(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 DROP DEFAULT, "
  . "ALTER COLUMN test2 DROP DEFAULT"
  );

});

it('can alter column set visible', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetVisible('test')
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test SET VISIBLE");

});

it('can alter multiple columns set visible', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetVisible(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 SET VISIBLE, "
  . "ALTER COLUMN test2 SET VISIBLE"
  );

});

it('can alter column set invisible', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetInvisible('test')
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test SET INVISIBLE");

});

it('can alter multiple columns set invisible', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetInvisible(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 SET INVISIBLE, "
  . "ALTER COLUMN test2 SET INVISIBLE"
  );

});

it('can alter column set not null', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetNotNull('test')
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test SET NOT NULL");

});

it('can alter multiple columns set not null', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetNotNull(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 SET NOT NULL, "
  . "ALTER COLUMN test2 SET NOT NULL"
  );

});

it('can alter column drop not null', function ()
{

  expect(
    (string) SQL::alter()
    ->columnDropNotNull('test')
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test DROP NOT NULL");

});

it('can alter multiple columns drop not null', function ()
{

  expect(
    (string) SQL::alter()
    ->columnDropNotNull(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 DROP NOT NULL, "
  . "ALTER COLUMN test2 DROP NOT NULL"
  );

});

it('can alter column drop expression', function ()
{

  expect(
    (string) SQL::alter()
    ->columnDropExpression('test')
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test DROP EXPRESSION");

});

it('can alter multiple columns drop expression', function ()
{

  expect(
    (string) SQL::alter()
    ->columnDropExpression(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 DROP EXPRESSION, "
  . "ALTER COLUMN test2 DROP EXPRESSION"
  );

});

it('can alter column drop expression if exists', function ()
{

  expect(
    (string) SQL::alter()
    ->columnDropExpressionIfExists('test')
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test DROP EXPRESSION IF EXISTS");

});

it('can alter multiple columns drop expression if exists', function ()
{

  expect(
    (string) SQL::alter()
    ->columnDropExpressionIfExists(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 DROP EXPRESSION IF EXISTS, "
  . "ALTER COLUMN test2 DROP EXPRESSION IF EXISTS"
  );

});

it('can alter column drop identity', function ()
{

  expect(
    (string) SQL::alter()
    ->columnDropIdentity('test')
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test DROP IDENTITY");

});

it('can alter multiple columns drop identity', function ()
{

  expect(
    (string) SQL::alter()
    ->columnDropIdentity(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 DROP IDENTITY, "
  . "ALTER COLUMN test2 DROP IDENTITY"
  );

});

it('can alter column drop identity if exists', function ()
{

  expect(
    (string) SQL::alter()
    ->columnDropIdentityIfExists('test')
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test DROP IDENTITY IF EXISTS");

});

it('can alter multiple columns drop identity if exists', function ()
{

  expect(
    (string) SQL::alter()
    ->columnDropIdentityIfExists(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 DROP IDENTITY IF EXISTS, "
  . "ALTER COLUMN test2 DROP IDENTITY IF EXISTS"
  );

});

it('can alter column set statistics', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetStatistics('test', 1)
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test SET STATISTICS 1");

});

it('can alter multiple columns set statistics', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetStatistics(['test1', 'test2'], 1)
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 SET STATISTICS 1, "
  . "ALTER COLUMN test2 SET STATISTICS 1"
  );

});

it('can alter column set compression', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetCompression('test1', 'test2')
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test1 SET COMPRESSION test2");

});

it('can alter multiple columns set compression', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetCompression(['test1', 'test2'], 'test3')
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 SET COMPRESSION test3, "
  . "ALTER COLUMN test2 SET COMPRESSION test3"
  );

});

it('can alter column set storage plain', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetStoragePlain('test')
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test SET STORAGE PLAIN");

});

it('can alter multiple columns set storage plain', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetStoragePlain(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 SET STORAGE PLAIN, "
  . "ALTER COLUMN test2 SET STORAGE PLAIN"
  );

});

it('can alter column set storage external', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetStorageExternal('test')
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test SET STORAGE EXTERNAL");

});

it('can alter multiple columns set storage external', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetStorageExternal(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 SET STORAGE EXTERNAL, "
  . "ALTER COLUMN test2 SET STORAGE EXTERNAL"
  );

});

it('can alter column set storage extended', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetStorageExtended('test')
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test SET STORAGE EXTENDED");

});

it('can alter multiple columns set storage extended', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetStorageExtended(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 SET STORAGE EXTENDED, "
  . "ALTER COLUMN test2 SET STORAGE EXTENDED"
  );

});

it('can alter column set storage main', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetStorageMain('test')
  )
  ->toEqual("ALTER TABLE ALTER COLUMN test SET STORAGE MAIN");

});

it('can alter multiple columns set storage main', function ()
{

  expect(
    (string) SQL::alter()
    ->columnSetStorageMain(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ALTER COLUMN test1 SET STORAGE MAIN, "
  . "ALTER COLUMN test2 SET STORAGE MAIN"
  );

});