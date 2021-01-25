<?php
    $host = getenv('POSTGRES_HOST');
    $dbname = getenv('POSTGRES_DB');
    $user = getenv('POSTGRES_USER');
    $password = getenv('POSTGRES_PASSWORD');

    // $connect = mysqli_connect('db', 'root', 'madenci', 'CDR');
    $connect = pg_connect("host=$host dbname=$dbname user=$user password=$password");

    if (!$connect) {
        die('Error connect to DataBase');
    }
