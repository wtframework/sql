<?php

declare(strict_types=1);

use WTFramework\SQL\SQL;

it('can set owner to', function ()
{

  expect(
    (string) SQL::alter()
    ->ownerTo('test')
  )
  ->toEqual("ALTER TABLE OWNER TO test");

});

it('can set owner to current role', function ()
{

  expect(
    (string) SQL::alter()
    ->ownerToCurrentRole()
  )
  ->toEqual("ALTER TABLE OWNER TO CURRENT_ROLE");

});

it('can set owner to current user', function ()
{

  expect(
    (string) SQL::alter()
    ->ownerToCurrentUser()
  )
  ->toEqual("ALTER TABLE OWNER TO CURRENT_USER");

});

it('can set owner to session user', function ()
{

  expect(
    (string) SQL::alter()
    ->ownerToSessionUser()
  )
  ->toEqual("ALTER TABLE OWNER TO SESSION_USER");

});