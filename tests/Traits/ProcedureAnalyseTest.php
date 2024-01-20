<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can select procedure analyse', function ()
{

  expect(
    (string) SQL::select()
    ->procedureAnalyse()
  )
  ->toEqual('SELECT * PROCEDURE ANALYSE ()');

});

it('can select procedure analyse with max elements', function ()
{

  expect(
    (string) SQL::select()
    ->procedureAnalyse(1)
  )
  ->toEqual('SELECT * PROCEDURE ANALYSE (1)');

});

it('can select procedure analyse with max elements and max memory', function ()
{

  expect(
    (string) SQL::select()
    ->procedureAnalyse(1, 2)
  )
  ->toEqual('SELECT * PROCEDURE ANALYSE (1, 2)');

});