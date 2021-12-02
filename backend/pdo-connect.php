<?php
$servername = "localhost";
$db_username = "pynnonen.pyry";
$db_password = "PyrynK4nt4!";
$dbname = "votedb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}