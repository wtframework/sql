<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Having;

it('can get having', function ()
{

  expect((new Having)->having('test', 1))
  ->toEqual("test = 1");

});

it('can get having with constructor', function ()
{

  expect(new Having('test', 1))
  ->toEqual("test = 1");

});