<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can get partition', function ()
{

  expect(
    (string) SQL::partition('test')
    ->valuesLessThanMaxValue()
    ->engine('test')
    ->comment('test')
    ->dataDirectory('test')
    ->indexDirectory('test')
    ->maxRows(10)
    ->minRows(5)
    ->tablespace('test')
    ->nodeGroup('test')
  )
  ->toEqual(
    "PARTITION "
  . "test "
  . "VALUES LESS THAN MAXVALUE "
  . "ENGINE test "
  . "COMMENT 'test' "
  . "DATA DIRECTORY 'test' "
  . "INDEX DIRECTORY 'test' "
  . "MAX_ROWS 10 "
  . "MIN_ROWS 5 "
  . "TABLESPACE test "
  . "NODEGROUP test"
  );

});