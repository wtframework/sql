<?php

declare(strict_types=1);

namespace WTFramework\SQL;

use WTFramework\Enums\ToArray;
use WTFramework\SQL\Statements\Alter;
use WTFramework\SQL\Statements\Create;
use WTFramework\SQL\Statements\Delete;
use WTFramework\SQL\Statements\Drop;
use WTFramework\SQL\Statements\Insert;
use WTFramework\SQL\Statements\Replace;
use WTFramework\SQL\Statements\Select;
use WTFramework\SQL\Statements\Truncate;
use WTFramework\SQL\Statements\Update;

enum DBMS: string
{

  use ToArray;

  case MariaDB = 'mariadb';
  case MySQL = 'mysql';
  case SQLite = 'sqlite';
  case PostgreSQL = 'pgsql';
  case SQLServer = 'sqlsrv';

  public function alter(): Alter
  {
    return new Alter(dbms: $this);
  }

  public function create(): Create
  {
    return new Create(dbms: $this);
  }

  public function delete(): Delete
  {
    return new Delete(dbms: $this);
  }

  public function drop(): Drop
  {
    return new Drop(dbms: $this);
  }

  public function insert(): Insert
  {
    return new Insert(dbms: $this);
  }

  public function replace(): Replace
  {
    return new Replace(dbms: $this);
  }

  public function select(): Select
  {
    return new Select(dbms: $this);
  }

  public function truncate(): Truncate
  {
    return new Truncate(dbms: $this);
  }

  public function update(): Update
  {
    return new Update(dbms: $this);
  }

  public function column(string $name): Column
  {

    return new Column(
      dbms: $this,
      name: $name
    );

  }

  public function constraint(string $name = null): Constraint
  {

    return new Constraint(
      dbms: $this,
      name: $name
    );

  }

}