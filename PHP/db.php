<?php
//LOCAL
  $server = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'new_template';    

  $connection = mysqli_connect($server, $username, $password, $dbname);

if (!$connection) {
  die("Failed to connect to MySQL: " . mysqli_connect_error()) ;
}
?>