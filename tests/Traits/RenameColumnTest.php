<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can rename column', function ()
{

  expect(
    (string) SQL::alter()
    ->renameColumn('test1', 'test2')
  )
  ->toEqual("ALTER TABLE RENAME COLUMN test1 TO test2");

});

it('can rename multiple columns', function ()
{

  expect(
    (string) SQL::alter()
    ->renameColumn([
      'test1' => 'test2',
      'test3' => 'test4',
    ])
  )
  ->toEqual(
    "ALTER TABLE RENAME COLUMN test1 TO test2, RENAME COLUMN test3 TO test4"
  );

});