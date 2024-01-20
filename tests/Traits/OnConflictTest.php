<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set on conflict rollback', function ()
{

  expect(
    (string) SQL::constraint()
    ->onConflictRollback()
  )
  ->toEqual("ON CONFLICT ROLLBACK");

});

it('can set on conflict fail', function ()
{

  expect(
    (string) SQL::constraint()
    ->onConflictFail()
  )
  ->toEqual("ON CONFLICT FAIL");

});

it('can set on conflict ignore', function ()
{

  expect(
    (string) SQL::constraint()
    ->onConflictIgnore()
  )
  ->toEqual("ON CONFLICT IGNORE");

});

it('can set on conflict replace', function ()
{

  expect(
    (string) SQL::constraint()
    ->onConflictReplace()
  )
  ->toEqual("ON CONFLICT REPLACE");

});