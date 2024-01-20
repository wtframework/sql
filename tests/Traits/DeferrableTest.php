<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set deferrable', function ()
{

  expect(
    (string) SQL::constraint()
    ->deferrable()
  )
  ->toEqual("DEFERRABLE");

});

it('can set deferrable initially deferred', function ()
{

  expect(
    (string) SQL::constraint()
    ->deferrableDeferred()
  )
  ->toEqual("DEFERRABLE INITIALLY DEFERRED");

});

it('can set deferrable initially immediate', function ()
{

  expect(
    (string) SQL::constraint()
    ->deferrableImmediate()
  )
  ->toEqual("DEFERRABLE INITIALLY IMMEDIATE");

});

it('can set not deferrable', function ()
{

  expect(
    (string) SQL::constraint()
    ->notDeferrable()
  )
  ->toEqual("NOT DEFERRABLE");

});

it('can set not deferrable initially deferred', function ()
{

  expect(
    (string) SQL::constraint()
    ->notDeferrableDeferred()
  )
  ->toEqual("NOT DEFERRABLE INITIALLY DEFERRED");

});

it('can set not deferrable initially immediate', function ()
{

  expect(
    (string) SQL::constraint()
    ->notDeferrableImmediate()
  )
  ->toEqual("NOT DEFERRABLE INITIALLY IMMEDIATE");

});