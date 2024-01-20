<?php

declare(strict_types=1);

use WTFramework\SQL\Services\On;

it('can get on', function ()
{

  expect((new On)->on('test', 1))
  ->toEqual("test = 1");

});

it('can get on with constructor', function ()
{

  expect(new On('test', 1))
  ->toEqual("test = 1");

});