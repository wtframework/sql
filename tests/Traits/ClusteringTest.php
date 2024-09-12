<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set clustering', function ()
{

  expect(
    (string) SQL::index('test')
    ->clustering()
  )
  ->toEqual("INDEX (test) CLUSTERING = YES");

});

it('can set mo clustering', function ()
{

  expect(
    (string) SQL::index('test')
    ->noClustering()
  )
  ->toEqual("INDEX (test) CLUSTERING = NO");

});