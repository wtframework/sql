<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can convert to character set', function ()
{

  expect(
    (string) SQL::alter()
    ->convertToCharacterSet('test')
  )
  ->toEqual("ALTER TABLE CONVERT TO CHARACTER SET test");

});

it('can convert to character set and collation', function ()
{

  expect(
    (string) SQL::alter()
    ->convertToCharacterSet('test1', 'test2')
  )
  ->toEqual("ALTER TABLE CONVERT TO CHARACTER SET test1 COLLATE test2");

});