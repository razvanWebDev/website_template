<?php
$site_key = '6LcP9C8cAAAAAJpfFjJmPLDaPZysdEUFrvfaiT4e';
$secret_key = '6LcP9C8cAAAAALWcIr5gGzpBi2EcbtYfEsI5V1gD';
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