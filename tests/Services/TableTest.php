<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can get table', function ()
{

  expect(
    (string) SQL::table('t1')
    ->only()
    ->partition('p0')
    ->forSystemTimeAll()
    ->alias('t2')
    ->useIndex()
    ->column('c1')
    ->indexedBy('i1')
  )
  ->toBe(
    "ONLY "
  . "t1 "
  . "PARTITION (p0) "
  . "FOR SYSTEM_TIME ALL "
  . "AS t2 "
  . "USE INDEX () "
  . "(c1) "
  . "INDEXED BY i1"
  );

});