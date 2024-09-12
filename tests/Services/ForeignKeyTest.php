<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can get foreign key', function ()
{

  expect(
    (string) SQL::foreignKey('c1')
    ->index('a')
    ->references('t1')
    ->matchFull()
    ->onDeleteCascade()
    ->onUpdateCascade()
  )
  ->toBe(
    "FOREIGN KEY "
  . "a "
  . "(c1) "
  . "REFERENCES t1 "
  . "MATCH FULL "
  . "ON DELETE CASCADE "
  . "ON UPDATE CASCADE"
  );

});