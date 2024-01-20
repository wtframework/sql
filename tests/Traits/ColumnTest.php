<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can insert into column', function ()
{

  expect(
    (string) SQL::insert()
    ->column('test')
  )
  ->toEqual("INSERT (test) VALUES ()");

});

it('can insert into multiple columns', function ()
{

  expect(
    (string) SQL::insert()
    ->column(['test1', 'test2'])
  )
  ->toEqual("INSERT (test1, test2) VALUES ()");

});