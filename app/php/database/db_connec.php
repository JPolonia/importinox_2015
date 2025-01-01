<?php 
$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=$charset", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>