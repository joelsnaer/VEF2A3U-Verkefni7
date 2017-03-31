<?php
 $dsn = 'mysql:host=127.0.0.1;dbname=Verkefni7';
 $user = 'root';
 $password = 'catsanddogs123';

 try {
     $conn = new PDO($dsn, $user, $password);

     $conn->exec('SET NAMES "utf8"');
 } catch (PDOException $e) {
     echo 'Connection failed: ' . $e->getMessage();
 }

 ?>
