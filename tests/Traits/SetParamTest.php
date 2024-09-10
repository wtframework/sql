<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set storage parameter', function ()
{

  expect(
    (string) SQL::alter()
    ->setParam('test')
  )
  ->toEqual("ALTER TABLE SET (test)");

});

it('can set storage parameter with value', function ()
{

  expect(
    (string) SQL::alter()
    ->setParam('test1', 'test2')
  )
  ->toEqual("ALTER TABLE SET (test1 = test2)");

});

it('can set multiple storage parameters', function ()
{

  expect(
    (string) SQL::alter()
    ->setParam([
      'test1',
      'test2' => 'test3'
    ])
  )
  ->toEqual("ALTER TABLE SET (test1, test2 = test3)");

});