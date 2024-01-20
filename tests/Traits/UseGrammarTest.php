<?php

declare(strict_types=1);

use WTFramework\SQL\Grammar;
use WTFramework\SQL\SQL;

it('can use grammar', function ()
{

  SQL::use(null);

  expect(SQL::select()->use(Grammar::MariaDB)->grammar())
  ->toBe(Grammar::MariaDB);

  expect(SQL::select()->grammar())
  ->toBe(Grammar::MySQL);

});