<?php
$host = 'localhost';
$db   = 'jim_prototype';
$user = 'root';
$pass = 'root'; // For MAMP — change if needed
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// options are looped through on the internal PHP (C) level 
// each option is accessing a const code of the PDO class which acts as a way of 
// communicating instructions to throw errors or act in a certain way (fetch this type of array)
// when executing the PDO instance

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Throw exceptions on errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Clean associative array results
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Use real MySQL prepared statements
];

// creating new PDO class 

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $errorInfo) { // catch PDO exception (from options) store exception info inside $errorInfo variable
    die("Database connection failed: " . $errorInfo->getMessage()); // built in php method for retrieving error message
}
?>
