<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;
use WTFramework\SQL\Outfile;

it('can get path', function ()
{

  expect((string) new Outfile('/tmp/test.txt'))
  ->toEqual("'/tmp/test.txt'");

});

it('can get with charset', function ()
{

  expect(
    (string) (new Outfile('/tmp/test.txt'))
    ->charset('utf8')
  )
  ->toEqual("'/tmp/test.txt' CHARACTER SET utf8");

});

it('can get with fields terminated by', function ()
{

  expect(
    (string) (new Outfile('/tmp/test.txt'))
    ->fieldsTerminatedBy('\t')
  )
  ->toEqual("'/tmp/test.txt' FIELDS TERMINATED BY '\\t'");

});

it('can get with fields enclosed by', function ()
{

  expect(
    (string) (new Outfile('/tmp/test.txt'))
    ->fieldsEnclosedBy('')
  )
  ->toEqual("'/tmp/test.txt' FIELDS ENCLOSED BY ''");

});

it('can get with fields optionally enclosed by', function ()
{

  expect(
    (string) (new Outfile('/tmp/test.txt'))
    ->fieldsOptionallyEnclosedBy('')
  )
  ->toEqual("'/tmp/test.txt' FIELDS OPTIONALLY ENCLOSED BY ''");

});

it('can get with lines starting by', function ()
{

  expect(
    (string) (new Outfile('/tmp/test.txt'))
    ->linesStartingBy('')
  )
  ->toEqual("'/tmp/test.txt' LINES STARTING BY ''");

});

it('can get with lines terminated by', function ()
{

  expect(
    (string) (new Outfile('/tmp/test.txt'))
    ->linesTerminatedBy('\n')
  )
  ->toEqual("'/tmp/test.txt' LINES TERMINATED BY '\\n'");

});

it('can select into outfile', function ()
{

  expect(
    (string) DBMS::MariaDB->select()
      ->intoOutfile(new Outfile('/tmp/test.txt'))
  )
  ->toEqual("SELECT * INTO OUTFILE '/tmp/test.txt'");

});