<?php
$url = parse_url(getenv("DATABASE_URL"));
//print_r($url);exit;
$host = $url["host"];
$username = $url["user"];
$port = $url["port"];
$password = $url["pass"];
$database = substr($url["path"], 1);
$db= [

   'default' => 'postgres',

   'connections' => [
        'mysql' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST'),
            'port'      => env('DB_PORT'),
            'database'  => env('DB_DATABASE'),
            'username'  => env('DB_USERNAME'),
            'password'  => env('DB_PASSWORD'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
         ],

        'postgres' => [
            'driver'    => 'pgsql',
            'host'     => $host,
            'port'      => $port,
            'database' => $database,
            'username' => $username,
            'password' => $password,
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
            'schema'   => 'public',
        ],
    ],
];
//echo '<pre>';
//print_r($db);exit;
return $db;