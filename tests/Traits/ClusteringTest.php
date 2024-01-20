<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set clustering', function ()
{

  expect(
    (string) SQL::index()
    ->clustering()
  )
  ->toEqual("INDEX CLUSTERING = YES");

});

it('can set mo clustering', function ()
{

  expect(
    (string) SQL::index()
    ->noClustering()
  )
  ->toEqual("INDEX CLUSTERING = NO");

});