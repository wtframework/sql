<?php

declare(strict_types=1);

use WTFramework\SQL\Services\ForeignKey;
use WTFramework\SQL\SQL;

it('can create foreign key', function ()
{

  $stmt = SQL::create();

  expect($foreign_key = $stmt->foreignKey('test'))
  ->toBeInstanceOf(ForeignKey::class);

  expect((string) $foreign_key)
  ->toEqual("FOREIGN KEY (test)");

  expect((string) $stmt)
  ->toEqual("CREATE TABLE (FOREIGN KEY (test))");

});