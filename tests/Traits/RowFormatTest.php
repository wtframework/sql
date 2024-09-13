<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set row format default', function ()
{

  expect(
    (string) SQL::create()
    ->rowFormatDefault()
  )
  ->toEqual("CREATE TABLE ROW_FORMAT = DEFAULT");

});

it('can set row format dynamic', function ()
{

  expect(
    (string) SQL::create()
    ->rowFormatDynamic()
  )
  ->toEqual("CREATE TABLE ROW_FORMAT = DYNAMIC");

});

it('can set row format fixed', function ()
{

  expect(
    (string) SQL::create()
    ->rowFormatFixed()
  )
  ->toEqual("CREATE TABLE ROW_FORMAT = FIXED");

});

it('can set row format compressed', function ()
{

  expect(
    (string) SQL::create()
    ->rowFormatCompressed()
  )
  ->toEqual("CREATE TABLE ROW_FORMAT = COMPRESSED");

});

it('can set row format redundant', function ()
{

  expect(
    (string) SQL::create()
    ->rowFormatRedundant()
  )
  ->toEqual("CREATE TABLE ROW_FORMAT = REDUNDANT");

});

it('can set row format compact', function ()
{

  expect(
    (string) SQL::create()
    ->rowFormatCompact()
  )
  ->toEqual("CREATE TABLE ROW_FORMAT = COMPACT");

});

it('can set row format page', function ()
{

  expect(
    (string) SQL::create()
    ->rowFormatPage()
  )
  ->toEqual("CREATE TABLE ROW_FORMAT = PAGE");

});