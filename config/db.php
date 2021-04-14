<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=postgres;dbname=education',
    'username' => 'postgres',
    'password' => '12345',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
