<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set invisible', function ()
{

  expect(
    (string) SQL::index('test')
    ->invisible()
  )
  ->toEqual("INDEX (test) INVISIBLE");

});

it('can set visible', function ()
{

  expect(
    (string) SQL::index('test')
    ->visible()
  )
  ->toEqual("INDEX (test) VISIBLE");

});

it('can set not invisible', function ()
{

  expect(
    (string) SQL::index('test')
    ->notInvisible()
  )
  ->toEqual("INDEX (test) NOT INVISIBLE");

});