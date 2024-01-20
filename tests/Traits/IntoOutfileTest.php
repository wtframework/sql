<?php

declare(strict_types=1);

use WTFramework\SQL\Services\Outfile;
use WTFramework\SQL\SQL;

it('can select into outfile string', function ()
{

  expect(
    (string) SQL::select()
    ->intoOutfile('test')
  )
  ->toEqual("SELECT * INTO OUTFILE 'test'");

});

it('can select into outfile object', function ()
{

  expect(
    (string) SQL::select()
    ->intoOutfile(new Outfile('test'))
  )
  ->toEqual("SELECT * INTO OUTFILE 'test'");

});