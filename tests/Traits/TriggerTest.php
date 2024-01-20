<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can enable trigger', function ()
{

  expect(
    (string) SQL::alter()
    ->enableTrigger('test')
  )
  ->toEqual("ALTER TABLE ENABLE TRIGGER test");

});

it('can enable multiple triggers', function ()
{

  expect(
    (string) SQL::alter()
    ->enableTrigger(['test1', 'test2'])
  )
  ->toEqual("ALTER TABLE ENABLE TRIGGER test1, ENABLE TRIGGER test2");

});

it('can disable trigger', function ()
{

  expect(
    (string) SQL::alter()
    ->disableTrigger('test')
  )
  ->toEqual("ALTER TABLE DISABLE TRIGGER test");

});

it('can disable multiple triggers', function ()
{

  expect(
    (string) SQL::alter()
    ->disableTrigger(['test1', 'test2'])
  )
  ->toEqual("ALTER TABLE DISABLE TRIGGER test1, DISABLE TRIGGER test2");

});

it('can enable replica trigger', function ()
{

  expect(
    (string) SQL::alter()
    ->enableReplicaTrigger('test')
  )
  ->toEqual("ALTER TABLE ENABLE REPLICA TRIGGER test");

});

it('can enable multiple replica triggers', function ()
{

  expect(
    (string) SQL::alter()
    ->enableReplicaTrigger(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ENABLE REPLICA TRIGGER test1, ENABLE REPLICA TRIGGER test2"
  );

});

it('can enable always trigger', function ()
{

  expect(
    (string) SQL::alter()
    ->enableAlwaysTrigger('test')
  )
  ->toEqual("ALTER TABLE ENABLE ALWAYS TRIGGER test");

});

it('can enable multiple always triggers', function ()
{

  expect(
    (string) SQL::alter()
    ->enableAlwaysTrigger(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ENABLE ALWAYS TRIGGER test1, ENABLE ALWAYS TRIGGER test2"
  );

});