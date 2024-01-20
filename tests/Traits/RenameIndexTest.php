<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can rename index', function ()
{

  expect(
    (string) SQL::alter()
    ->renameIndex('test1', 'test2')
  )
  ->toEqual("ALTER TABLE RENAME INDEX test1 TO test2");

});

it('can rename multiple indexes', function ()
{

  expect(
    (string) SQL::alter()
    ->renameIndex([
      'test1' => 'test2',
      'test3' => 'test4',
    ])
  )
  ->toEqual(
    "ALTER TABLE RENAME INDEX test1 TO test2, RENAME INDEX test3 TO test4"
  );

});