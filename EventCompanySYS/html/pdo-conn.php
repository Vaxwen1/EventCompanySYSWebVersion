<?php 
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=eventcompany; charset=utf8', 'root', '');
}
catch (PDOException $err) {

    echo "Database connection problem: " . $err->getMessage();
    exit();

}
?>