<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Where;

it('can get where', function ()
{

  expect((new Where)->where('test', 1))
  ->toEqual("test = 1");

});

it('can get where with constructor', function ()
{

  expect(new Where('test', 1))
  ->toEqual("test = 1");

});