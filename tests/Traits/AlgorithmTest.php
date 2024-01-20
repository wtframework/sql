<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set algorithm default', function ()
{

  expect(
    (string) SQL::dropIndex('test')
    ->algorithmDefault()
  )
  ->toEqual("DROP INDEX test ALGORITHM DEFAULT");

});

it('can set algorithm in place', function ()
{

  expect(
    (string) SQL::dropIndex('test')
    ->algorithmInPlace()
  )
  ->toEqual("DROP INDEX test ALGORITHM INPLACE");

});

it('can set algorithm copy', function ()
{

  expect(
    (string) SQL::dropIndex('test')
    ->algorithmCopy()
  )
  ->toEqual("DROP INDEX test ALGORITHM COPY");

});

it('can set algorithm no copy', function ()
{

  expect(
    (string) SQL::dropIndex('test')
    ->algorithmNoCopy()
  )
  ->toEqual("DROP INDEX test ALGORITHM NOCOPY");

});

it('can set algorithm instant', function ()
{

  expect(
    (string) SQL::dropIndex('test')
    ->algorithmInstant()
  )
  ->toEqual("DROP INDEX test ALGORITHM INSTANT");

});