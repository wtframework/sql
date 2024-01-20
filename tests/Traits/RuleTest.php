<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can enable rule', function ()
{

  expect(
    (string) SQL::alter()
    ->enableRule('test')
  )
  ->toEqual("ALTER TABLE ENABLE RULE test");

});

it('can enable multiple rules', function ()
{

  expect(
    (string) SQL::alter()
    ->enableRule(['test1', 'test2'])
  )
  ->toEqual("ALTER TABLE ENABLE RULE test1, ENABLE RULE test2");

});

it('can disable rule', function ()
{

  expect(
    (string) SQL::alter()
    ->disableRule('test')
  )
  ->toEqual("ALTER TABLE DISABLE RULE test");

});

it('can disable multiple rules', function ()
{

  expect(
    (string) SQL::alter()
    ->disableRule(['test1', 'test2'])
  )
  ->toEqual("ALTER TABLE DISABLE RULE test1, DISABLE RULE test2");

});

it('can enable replica rule', function ()
{

  expect(
    (string) SQL::alter()
    ->enableReplicaRule('test')
  )
  ->toEqual("ALTER TABLE ENABLE REPLICA RULE test");

});

it('can enable multiple replica rules', function ()
{

  expect(
    (string) SQL::alter()
    ->enableReplicaRule(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ENABLE REPLICA RULE test1, ENABLE REPLICA RULE test2"
  );

});

it('can enable always rule', function ()
{

  expect(
    (string) SQL::alter()
    ->enableAlwaysRule('test')
  )
  ->toEqual("ALTER TABLE ENABLE ALWAYS RULE test");

});

it('can enable multiple always rules', function ()
{

  expect(
    (string) SQL::alter()
    ->enableAlwaysRule(['test1', 'test2'])
  )
  ->toEqual(
    "ALTER TABLE ENABLE ALWAYS RULE test1, ENABLE ALWAYS RULE test2"
  );

});