<?php
    $host = getenv('POSTGRES_HOST');
    $dbname = getenv('POSTGRES_DB');
    $user = getenv('POSTGRES_USER');
    $password = getenv('POSTGRES_PASSWORD');

    $connect = pg_connect("host=$host dbname=$dbname user=$user password=$password");

    if (!$connect) {
        die('Error connect to DataBase');
    }
