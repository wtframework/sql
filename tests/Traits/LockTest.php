<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set lock default', function ()
{

  expect(
    (string) SQL::dropIndex('test')
    ->lockDefault()
  )
  ->toEqual("DROP INDEX test LOCK = DEFAULT");

});

it('can set lock none', function ()
{

  expect(
    (string) SQL::dropIndex('test')
    ->lockNone()
  )
  ->toEqual("DROP INDEX test LOCK = NONE");

});

it('can set lock shared', function ()
{

  expect(
    (string) SQL::dropIndex('test')
    ->lockShared()
  )
  ->toEqual("DROP INDEX test LOCK = SHARED");

});

it('can set lock exclusive', function ()
{

  expect(
    (string) SQL::dropIndex('test')
    ->lockExclusive()
  )
  ->toEqual("DROP INDEX test LOCK = EXCLUSIVE");

});