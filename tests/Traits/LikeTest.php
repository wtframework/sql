<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can create like', function ()
{

  expect(
    (string) SQL::create()
    ->like('test')
    ->includingAll()
    ->includingComments()
    ->includingCompression()
    ->includingConstraints()
    ->includingDefaults()
    ->includingGenerated()
    ->includingIdentity()
    ->includingIndexes()
    ->includingStatistics()
    ->includingStorage()
    ->excludingAll()
    ->excludingComments()
    ->excludingCompression()
    ->excludingConstraints()
    ->excludingDefaults()
    ->excludingGenerated()
    ->excludingIdentity()
    ->excludingIndexes()
    ->excludingStatistics()
    ->excludingStorage()
  )
  ->toEqual(
    "CREATE TABLE LIKE test "
  . "INCLUDING ALL "
  . "INCLUDING COMMENTS "
  . "INCLUDING COMPRESSION "
  . "INCLUDING CONSTRAINTS "
  . "INCLUDING DEFAULTS "
  . "INCLUDING GENERATED "
  . "INCLUDING IDENTITY "
  . "INCLUDING INDEXES "
  . "INCLUDING STATISTICS "
  . "INCLUDING STORAGE "
  . "EXCLUDING ALL "
  . "EXCLUDING COMMENTS "
  . "EXCLUDING COMPRESSION "
  . "EXCLUDING CONSTRAINTS "
  . "EXCLUDING DEFAULTS "
  . "EXCLUDING GENERATED "
  . "EXCLUDING IDENTITY "
  . "EXCLUDING INDEXES "
  . "EXCLUDING STATISTICS "
  . "EXCLUDING STORAGE"
  );

});