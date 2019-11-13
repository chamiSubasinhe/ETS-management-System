<?php
$dsn = 'mysql:host=localhost;dbname=ets';
$username = 'asiri';
$password = 'asiri123';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}