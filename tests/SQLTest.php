<?php

declare(strict_types=1);

use WTFramework\SQL\CTE;
use WTFramework\SQL\Index;
use WTFramework\SQL\Outfile;
use WTFramework\SQL\Raw;
use WTFramework\SQL\SQL;
use WTFramework\SQL\Subquery;
use WTFramework\SQL\Table;
use WTFramework\SQL\Upsert;
use WTFramework\SQL\Where;
use WTFramework\SQL\Window;

it('can get binding', function ()
{

  expect(SQL::bind(''))
  ->toBeInstanceOf(Raw::class);

});

it('can get variable binding', function ()
{

  expect(SQL::bindVar($var))
  ->toBeInstanceOf(Raw::class);

});

it('can get cte', function ()
{

  expect(SQL::cte('', ''))
  ->toBeInstanceOf(CTE::class);

});

it('can get index', function ()
{

  expect(SQL::index(''))
  ->toBeInstanceOf(Index::class);

});

it('can get outfile', function ()
{

  expect(SQL::outfile(''))
  ->toBeInstanceOf(Outfile::class);

});

it('can get raw', function ()
{

  expect(SQL::raw(''))
  ->toBeInstanceOf(Raw::class);

});

it('can get subquery', function ()
{

  expect(SQL::subquery(''))
  ->toBeInstanceOf(Subquery::class);

});

it('can get table', function ()
{

  expect(SQL::table(''))
  ->toBeInstanceOf(Table::class);

});

it('can get upsert', function ()
{

  expect(SQL::upsert(''))
  ->toBeInstanceOf(Upsert::class);

});

it('can get where', function ()
{

  expect(SQL::where())
  ->toBeInstanceOf(Where::class);

});

it('can get window', function ()
{

  expect(SQL::window())
  ->toBeInstanceOf(Window::class);

});