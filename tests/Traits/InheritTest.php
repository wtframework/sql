<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can inherit table', function ()
{

  expect(
    (string) SQL::alter()
    ->inherit('test')
  )
  ->toEqual("ALTER TABLE INHERIT test");

});

it('can inherit multiple tables', function ()
{

  expect(
    (string) SQL::alter()
    ->inherit(['test1', 'test2'])
  )
  ->toEqual("ALTER TABLE INHERIT test1, INHERIT test2");

});

it('can no inherit table', function ()
{

  expect(
    (string) SQL::alter()
    ->noInherit('test')
  )
  ->toEqual("ALTER TABLE NO INHERIT test");

});

it('can no inherit multiple tables', function ()
{

  expect(
    (string) SQL::alter()
    ->noInherit(['test1', 'test2'])
  )
  ->toEqual("ALTER TABLE NO INHERIT test1, NO INHERIT test2");

});