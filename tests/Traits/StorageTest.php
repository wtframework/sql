<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set storage disk', function ()
{

  expect(
    (string) SQL::column('test')
    ->storageDisk()
  )
  ->toEqual("test STORAGE DISK");

});

it('can set storage memory', function ()
{

  expect(
    (string) SQL::column('test')
    ->storageMemory()
  )
  ->toEqual("test STORAGE MEMORY");

});