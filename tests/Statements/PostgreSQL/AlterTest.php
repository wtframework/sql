<?php

declare(strict_types=1);

use WTFramework\SQL\DBMS;

beforeEach(fn () => $this->sql = DBMS::PostgreSQL);

it('can alter', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test')
  )
  ->toEqual('ALTER TABLE test');

});

it('can alter if exists', function ()
{

  expect(
    (string) $this->sql->alter()
    ->ifExists()
    ->table('test')
  )
  ->toEqual('ALTER TABLE IF EXISTS test');

});

it('can alter all in tablespace', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->allInTablespace()
  )
  ->toEqual('ALTER TABLE ALL IN TABLESPACE test1');

});

it('can alter owned by', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->ownedBy('test2')
  )
  ->toEqual('ALTER TABLE test1 OWNED BY test2');

});

it('can alter owned by multiple tables', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->ownedBy(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 OWNED BY test2, test3');

});

it('can rename table', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->renameTo('test2')
  )
  ->toEqual('ALTER TABLE test1 RENAME TO test2');

});

it('can rename column', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->renameColumn(
      'test2',
      'test3'
    )
  )
  ->toEqual('ALTER TABLE test1 RENAME COLUMN test2 TO test3');

});

it('can add column', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->addColumn('test2 INT')
  )
  ->toEqual('ALTER TABLE test1 ADD COLUMN test2 INT');

});

it('can add constraint', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->addConstraint('test2')
  )
  ->toEqual('ALTER TABLE test1 ADD test2');

});

it('can drop column', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->dropColumn('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP COLUMN test2');

});

it('can validate constraint', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->validateConstraint('test2')
  )
  ->toEqual('ALTER TABLE test1 VALIDATE CONSTRAINT test2');

});

it('can validate multiple constraints', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->validateConstraint(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 VALIDATE CONSTRAINT test2, VALIDATE CONSTRAINT test3'
  );

});

it('can drop constraint', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->dropConstraint('test2')
  )
  ->toEqual('ALTER TABLE test1 DROP CONSTRAINT test2');

});

it('can enable trigger', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->enableTrigger('test2')
  )
  ->toEqual('ALTER TABLE test1 ENABLE TRIGGER test2');

});

it('can enable multiple triggers', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->enableTrigger(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 ENABLE TRIGGER test2, ENABLE TRIGGER test3'
  );

});

it('can disable trigger', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->disableTrigger('test2')
  )
  ->toEqual('ALTER TABLE test1 DISABLE TRIGGER test2');

});

it('can disable multiple triggers', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->disableTrigger(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 DISABLE TRIGGER test2, DISABLE TRIGGER test3'
  );

});

it('can enable replica trigger', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->enableReplicaTrigger('test2')
  )
  ->toEqual('ALTER TABLE test1 ENABLE REPLICA TRIGGER test2');

});

it('can enable multiple replica triggers', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->enableReplicaTrigger(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 ENABLE REPLICA TRIGGER test2, '
  . 'ENABLE REPLICA TRIGGER test3'
  );

});

it('can enable always trigger', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->enableAlwaysTrigger('test2')
  )
  ->toEqual('ALTER TABLE test1 ENABLE ALWAYS TRIGGER test2');

});

it('can enable always multipe triggers', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->enableAlwaysTrigger(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 ENABLE ALWAYS TRIGGER test2, '
  . 'ENABLE ALWAYS TRIGGER test3'
  );

});

it('can enable rule', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->enableRule('test2')
  )
  ->toEqual('ALTER TABLE test1 ENABLE RULE test2');

});

it('can enable multiple rules', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->enableRule(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 ENABLE RULE test2, ENABLE RULE test3'
  );

});

it('can disable rule', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->disableRule('test2')
  )
  ->toEqual('ALTER TABLE test1 DISABLE RULE test2');

});

it('can disable multiple rules', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->disableRule(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 DISABLE RULE test2, DISABLE RULE test3'
  );

});

it('can enable replica rule', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->enableReplicaRule('test2')
  )
  ->toEqual('ALTER TABLE test1 ENABLE REPLICA RULE test2');

});

it('can enable multiple replica rules', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->enableReplicaRule(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 ENABLE REPLICA RULE test2, '
  . 'ENABLE REPLICA RULE test3'
  );

});

it('can enable always rule', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->enableAlwaysRule('test2')
  )
  ->toEqual('ALTER TABLE test1 ENABLE ALWAYS RULE test2');

});

it('can enable always multiple rules', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->enableAlwaysRule(['test2', 'test3'])
  )
  ->toEqual(
    'ALTER TABLE test1 ENABLE ALWAYS RULE test2, '
  . 'ENABLE ALWAYS RULE test3'
  );

});

it('can rename constraint', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->renameConstraint(
      'test2',
      'test3'
    )
  )
  ->toEqual('ALTER TABLE test1 RENAME CONSTRAINT test2 TO test3');

});

it('can set schema', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->setSchema('test2')
  )
  ->toEqual('ALTER TABLE test1 SET SCHEMA test2');

});

it('can attach partition', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->attachPartition('p1')
  )
  ->toEqual('ALTER TABLE test1 ATTACH PARTITION p1 DEFAULT');

});

it('can set detach partition', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->detachPartition('p1')
  )
  ->toEqual('ALTER TABLE test1 DETACH PARTITION p1');

});

it('can set detach partition concurrently', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->detachPartition('p1')
    ->concurrently()
  )
  ->toEqual('ALTER TABLE test1 DETACH PARTITION p1 CONCURRENTLY');

});

it('can set detach partition finalize', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->detachPartition('p1')
    ->finalize()
  )
  ->toEqual('ALTER TABLE test1 DETACH PARTITION p1 FINALIZE');

});

it('can disable row level security', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test')
    ->disableRowLevelSecurity()
  )
  ->toEqual('ALTER TABLE test DISABLE ROW LEVEL SECURITY');

});

it('can enable row level security', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test')
    ->enableRowLevelSecurity()
  )
  ->toEqual('ALTER TABLE test ENABLE ROW LEVEL SECURITY');

});

it('can force row level security', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test')
    ->forceRowLevelSecurity()
  )
  ->toEqual('ALTER TABLE test FORCE ROW LEVEL SECURITY');

});

it('can no force row level security', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test')
    ->noForceRowLevelSecurity()
  )
  ->toEqual('ALTER TABLE test NO FORCE ROW LEVEL SECURITY');

});

it('can cluster on', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->clusterOn('test2')
  )
  ->toEqual('ALTER TABLE test1 CLUSTER ON test2');

});

it('can set without cluster', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test')
    ->setWithoutCluster()
  )
  ->toEqual('ALTER TABLE test SET WITHOUT CLUSTER');

});

it('can set tablespace', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->setTablespace('t2')
  )
  ->toEqual('ALTER TABLE test1 SET TABLESPACE t2');

});

it('can set tablespace nowait', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->setTablespaceNoWait('t2')
  )
  ->toEqual('ALTER TABLE test1 SET TABLESPACE t2 NOWAIT');

});

it('can set access method', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->setAccessMethod('t2')
  )
  ->toEqual('ALTER TABLE test1 SET ACCESS METHOD t2');

});

it('can set logged', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test')
    ->setLogged()
  )
  ->toEqual('ALTER TABLE test SET LOGGED');

});

it('can set unlogged', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test')
    ->setUnlogged()
  )
  ->toEqual('ALTER TABLE test SET UNLOGGED');

});

it('can set storage parameter', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->set('test2', 'test3')
  )
  ->toEqual('ALTER TABLE test1 SET (test2=test3)');

});

it('can set multiple storage parameters', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test')
    ->set([
      'test1' => null,
      'test2' => true,
      'test3' => false,
      'test4' => 1,
    ])
  )
  ->toEqual('ALTER TABLE test SET (test1, test2=TRUE, test3=FALSE, test4=1)');

});

it('can reset storage parameter', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->reset('test2')
  )
  ->toEqual('ALTER TABLE test1 RESET (test2)');

});

it('can reset multiple storage parameters', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->reset(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 RESET (test2, test3)');

});

it('can inherit', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->inherit('test2')
  )
  ->toEqual('ALTER TABLE test1 INHERIT test2');

});

it('can inherit multiple tables', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->inherit(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 INHERIT test2, INHERIT test3');

});

it('can no inherit', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->noInherit('test2')
  )
  ->toEqual('ALTER TABLE test1 NO INHERIT test2');

});

it('can no inherit multiple tables', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->noInherit(['test2', 'test3'])
  )
  ->toEqual('ALTER TABLE test1 NO INHERIT test2, NO INHERIT test3');

});

it('can alter of', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->of('test2')
  )
  ->toEqual('ALTER TABLE test1 OF test2');

});

it('can alter not of', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test')
    ->notOf()
  )
  ->toEqual('ALTER TABLE test NOT OF');

});

it('can set owner to', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->ownerTo('test2')
  )
  ->toEqual('ALTER TABLE test1 OWNER TO test2');

});

it('can set owner to current rolw', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->ownerToCurrentRole()
  )
  ->toEqual('ALTER TABLE test1 OWNER TO CURRENT_ROLE');

});

it('can set owner to current user', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->ownerToCurrentUser()
  )
  ->toEqual('ALTER TABLE test1 OWNER TO CURRENT_USER');

});

it('can set owner to session user', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->ownerToSessionUser()
  )
  ->toEqual('ALTER TABLE test1 OWNER TO SESSION_USER');

});

it('can set replica identity default', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->replicaIdentityDefault()
  )
  ->toEqual('ALTER TABLE test1 REPLICA IDENTITY DEFAULT');

});

it('can set replica identity full', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->replicaIdentityFull()
  )
  ->toEqual('ALTER TABLE test1 REPLICA IDENTITY FULL');

});

it('can set replica identity using index', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->replicaIdentityUsingIndex('test2')
  )
  ->toEqual('ALTER TABLE test1 REPLICA IDENTITY USING INDEX test2');

});

it('can set replica identity nothing', function ()
{

  expect(
    (string) $this->sql->alter()
    ->table('test1')
    ->replicaIdentityNothing()
  )
  ->toEqual('ALTER TABLE test1 REPLICA IDENTITY NOTHING');

});