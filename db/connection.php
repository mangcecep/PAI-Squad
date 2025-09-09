<?php
$server = 'localhost';
$db = 'kurikulum';
$username = 'root';
$password = '';
$db = 'kurikulum';

$connection = new mysqli(
    hostname: $server,
    username: $username,
    password: $password,
    database: $db
);

if($connection->error) {
    die(" ERROR CONNECTION" . $connection->error);
}
?>