<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can reset storage parameter', function ()
{

  expect(
    (string) SQL::alter()
    ->reset('test')
  )
  ->toEqual("ALTER TABLE RESET (test)");

});

it('can reset multiple storage parameters', function ()
{

  expect(
    (string) SQL::alter()
    ->reset(['test1', 'test2'])
  )
  ->toEqual("ALTER TABLE RESET (test1, test2)");

});