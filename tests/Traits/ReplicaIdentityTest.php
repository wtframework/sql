<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set replica identity default', function ()
{

  expect(
    (string) SQL::alter()
    ->replicaIdentityDefault()
  )
  ->toEqual("ALTER TABLE REPLICA IDENTITY DEFAULT");

});

it('can set replica identity usning index', function ()
{

  expect(
    (string) SQL::alter()
    ->replicaIdentityUsingIndex('test')
  )
  ->toEqual("ALTER TABLE REPLICA IDENTITY USING INDEX test");

});

it('can set replica identity full', function ()
{

  expect(
    (string) SQL::alter()
    ->replicaIdentityFull()
  )
  ->toEqual("ALTER TABLE REPLICA IDENTITY FULL");

});

it('can set replica identity nothing', function ()
{

  expect(
    (string) SQL::alter()
    ->replicaIdentityNothing()
  )
  ->toEqual("ALTER TABLE REPLICA IDENTITY NOTHING");

});