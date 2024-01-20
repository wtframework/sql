<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can modify column', function ()
{

  expect(
    (string) SQL::alter()
    ->modify('test')
  )
  ->toEqual("ALTER TABLE MODIFY COLUMN test");

});

it('can modify multiple columns', function ()
{

  expect(
    (string) SQL::alter()
    ->modify(['test1', 'test2'])
  )
  ->toEqual("ALTER TABLE MODIFY COLUMN test1, MODIFY COLUMN test2");

});

it('can modify bound value column', function ()
{

  expect(
    (string) $stmt = SQL::alter()
    ->modify(SQL::bind('test'))
  )
  ->toEqual("ALTER TABLE MODIFY COLUMN ?");

  expect($stmt->bindings())
  ->toEqual(['test']);

});