<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set owned by', function ()
{

  expect(
    (string) SQL::alter()
    ->ownedBy('test')
  )
  ->toEqual("ALTER TABLE OWNED BY test");

});

it('can set owned by multiple', function ()
{

  expect(
    (string) SQL::alter()
    ->ownedBy(['test1', 'test2'])
  )
  ->toEqual("ALTER TABLE OWNED BY test1, test2");

});