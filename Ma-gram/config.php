<?php
/* Database credentials. */
if ($_SERVER['HTTP_HOST'] !== 'localhost') {
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'c3645Mick');
define('DB_PASSWORD', '10jojo10');
define('DB_NAME', 'c3645magram');
} else {
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'magram'); }

/* Attempt to connect to MySQL database */
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
