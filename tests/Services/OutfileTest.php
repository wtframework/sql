<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can get outfile', function ()
{

  expect(
    (string) SQL::outfile("'test'.txt")
    ->characterSet('utf8mb4')
    ->fieldsTerminatedBy("'")
    ->fieldsEnclosedBy("'")
    ->fieldsEscapedBy("'")
    ->linesStartingBy("'")
    ->linesTerminatedBy("'")
  )
  ->toEqual(
    "'''test''.txt' "
  . "CHARACTER SET utf8mb4 "
  . "FIELDS TERMINATED BY '''' "
  . "ENCLOSED BY '''' "
  . "ESCAPED BY '''' "
  . "LINES STARTING BY '''' "
  . "TERMINATED BY ''''"
  );

  expect(
    (string) SQL::outfile('')
    ->fieldsOptionallyEnclosedBy("'")
  )
  ->toEqual("'' FIELDS OPTIONALLY ENCLOSED BY ''''");

});