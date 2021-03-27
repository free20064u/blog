<?php
# Parameters for making connection.

$host = 'localhost';
$db = 'blog';
$user = 'root';
$password = '';

# Create connection to database.
try {
    $connect = new PDO("mysql:host=". $host . ";dbname=" . $db, $user, $password);
} catch(PDOException $e){
    echo "Couldn't connect to the database: " . $e -> getMessage();
}