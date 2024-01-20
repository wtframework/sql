<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set clustered', function ()
{

  expect(
    (string) SQL::createIndex('test')
    ->clustered()
  )
  ->toEqual("CREATE CLUSTERED INDEX test");

});

it('can set nonclustered', function ()
{

  expect(
    (string) SQL::createIndex('test')
    ->nonClustered()
  )
  ->toEqual("CREATE NONCLUSTERED INDEX test");

});