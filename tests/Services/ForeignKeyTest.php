<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can get foreign key', function ()
{

  expect(
    (string) SQL::foreignKey('c1')
    ->index('i1')
    ->references('t1')
    ->matchFull()
    ->onDeleteCascade()
    ->onUpdateCascade()
  )
  ->toBe(
    "FOREIGN KEY "
  . "i1 "
  . "(c1) "
  . "REFERENCES t1 "
  . "MATCH FULL "
  . "ON DELETE CASCADE "
  . "ON UPDATE CASCADE"
  );

});