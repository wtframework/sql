<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set invisible', function ()
{

  expect(
    (string) SQL::index()
    ->invisible()
  )
  ->toEqual("INDEX INVISIBLE");

});

it('can set visible', function ()
{

  expect(
    (string) SQL::index()
    ->visible()
  )
  ->toEqual("INDEX VISIBLE");

});

it('can set not invisible', function ()
{

  expect(
    (string) SQL::index()
    ->notInvisible()
  )
  ->toEqual("INDEX NOT INVISIBLE");

});