<?php
$site_key = '6LcP9C8cAAAAAJpfFjJmPLDaPZysdEUFrvfaiT4e';
$secret_key = '6LcP9C8cAAAAALWcIr5gGzpBi2EcbtYfEsI5V1gD';

// ONLINE (infinityfree)=============

// $server = 'sql108.epizy.com';
// $username = 'epiz_29581335';
// $password = 'bTEi09aoTZ9P';
// $dbname = 'epiz_29581335_new_template'; 

$website_url = "www.website-template.great-site.net";

//LOCAL=================================
  $server = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'new_template';    

  $connection = mysqli_connect($server, $username, $password, $dbname);

if (!$connection) {
  die("Failed to connect to MySQL: " . mysqli_connect_error()) ;
}
?>