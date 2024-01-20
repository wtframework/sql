<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set tablespace', function ()
{

  expect(
    (string) SQL::alter()
    ->setTablespace('test')
  )
  ->toEqual("ALTER TABLE SET TABLESPACE test");

});

it('can set tablespace nowait', function ()
{

  expect(
    (string) SQL::alter()
    ->setTablespaceNoWait('test')
  )
  ->toEqual("ALTER TABLE SET TABLESPACE test NOWAIT");

});