LmcUserDoctrineORM
==================
[![Build Status](https://travis-ci.com/LM-Commons/LmcUserDoctrineORM.svg?branch=master)](https://travis-ci.com/LM-Commons/LmcUserDoctrineORM    )
[![Coverage Status](https://coveralls.io/repos/github/LM-Commons/LmcUserDoctrineORM/badge.svg?branch=master)](https://coveralls.io/github/LM-Commons/LmcUserDoctrineORM?branch=master)

Based on ZfcUserDoctrineORM by Kyle Spraggs and the ZF-Commons team

Introduction
------------
LmcUserDoctrineORM is a Doctrine2 ORM storage adapter for [LmcUser](https://github.com/LM-Commons/LmcUser).

Options
-------

The following options are available:

- **enable_default_entities** - Boolean value, determines if the default User entity should be enabled. Set it to false in order to extend LmcUser\Entity\User with your own entity. Default is true.

Dependencies
------------

- [LmcUser](https://github.com/LM-Commons/LmcUser)
- [DoctrineModule](https://github.com/doctrine/DoctrineModule)
- [DoctrineORMModule](https://github.com/doctrine/DoctrineORMModule)

Installation
------------
Set up Database Connection Settings for Doctrine ORM:

Namely, go to [Doctrine Connection Settings](https://github.com/doctrine/DoctrineORMModule#connection-settings), and copy/paste/modify the example configuration file content into your `config/autoload/doctrine.orm.local.php`.  

Install Lmc Components:

    php composer.phar require lm-commons/lmc-user-doctrine-orm

Set up your Modules in `config/application/application.config.php`, something like

    'modules' => array(
        'DoctrineModule',
        'DoctrineORMModule',
        'LmcUser',
        'LmcUserDoctrineORM',
        'Application',
    ),

Now, you can use [LmcUser SQL schema](https://github.com/LM-Commons/LmcUser/tree/master/data) to set up your database tables.

Alternatively, you can use `doctrine-module` to do this work for you:

    vendor/bin/doctrine-module orm:schema-tool:update --dump-sql


Note: If you want to use a different table schema or user entity then you have to set `enable_default_entities` to `false` in the lmcuser [config file](https://github.com/LM-Commons/LmcUser/blob/master/config/lmcuser.global.php.dist)


If SQL looks okay, do: 

    vendor/bin/doctrine-module orm:schema-tool:update --force

You can now navigate to `/user` and it should work.
