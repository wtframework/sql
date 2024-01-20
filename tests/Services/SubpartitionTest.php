<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can get subpartition', function ()
{

  expect(
    (string) SQL::subpartition('test')
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
    "SUBPARTITION "
  . "test "
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