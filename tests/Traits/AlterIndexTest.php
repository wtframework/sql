<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can alter index invisible', function ()
{

  expect(
    (string) SQL::alter()
    ->indexInvisible('test')
  )
  ->toEqual("ALTER TABLE ALTER INDEX test INVISIBLE");

});

it('can alter multiple indexes invisible', function ()
{

  expect(
    (string) SQL::alter()
    ->indexInvisible(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ALTER INDEX test1 INVISIBLE, ALTER INDEX test2 INVISIBLE"
  );

});

it('can alter index not invisible', function ()
{

  expect(
    (string) SQL::alter()
    ->indexNotInvisible('test')
  )
  ->toEqual("ALTER TABLE ALTER INDEX test NOT INVISIBLE");

});

it('can alter multiple indexes not invisible', function ()
{

  expect(
    (string) SQL::alter()
    ->indexNotInvisible(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ALTER INDEX test1 NOT INVISIBLE, "
  . "ALTER INDEX test2 NOT INVISIBLE"
  );

});

it('can alter index visible', function ()
{

  expect(
    (string) SQL::alter()
    ->indexVisible('test')
  )
  ->toEqual("ALTER TABLE ALTER INDEX test VISIBLE");

});

it('can alter multiple indexes visible', function ()
{

  expect(
    (string) SQL::alter()
    ->indexVisible(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ALTER INDEX test1 VISIBLE, ALTER INDEX test2 VISIBLE"
  );

});