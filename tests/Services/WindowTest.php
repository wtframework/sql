<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can get window', function ()
{

  expect(
    (string) SQL::window('w')
    ->partitionBy('c1')
    ->orderBy('c1')
    ->range()
    ->betweenUnbounded()
    ->andUnbounded()
    ->excludeNoOthers()
  )
  ->toBe(
    "w "
  . "PARTITION BY c1 "
  . "ORDER BY c1 "
  . "RANGE "
  . "BETWEEN UNBOUNDED PRECEDING "
  . "AND UNBOUNDED FOLLOWING "
  . "EXCLUDE NO OTHERS"
  );

});