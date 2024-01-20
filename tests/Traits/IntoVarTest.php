<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can select into var', function ()
{

  expect(
    (string) SQL::select()
    ->intoVar('test')
  )
  ->toEqual('SELECT * INTO @test');

});

it('can select into multiple vars', function ()
{

  expect(
    (string) SQL::select()
    ->intoVar(['test1', 'test2'])
  )
  ->toEqual('SELECT * INTO @test1, @test2');

});