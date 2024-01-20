<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can import tablespace', function ()
{

  expect(
    (string) SQL::alter()
    ->importTablespace()
  )
  ->toEqual("ALTER TABLE IMPORT TABLESPACE");

});

it('can discard tablespace', function ()
{

  expect(
    (string) SQL::alter()
    ->discardTablespace()
  )
  ->toEqual("ALTER TABLE DISCARD TABLESPACE");

});