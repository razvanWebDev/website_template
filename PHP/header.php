<?php 
$site_key = '6LcP9C8cAAAAAJpfFjJmPLDaPZysdEUFrvfaiT4e';
$secret_key = '6LcP9C8cAAAAALWcIr5gGzpBi2EcbtYfEsI5V1gD';
?>

<?php include "PHP/db.php" ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="img/logo.png">
    <meta charset="UTF-8" lang="EN">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Site Name</title>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $site_key ?>"></script>

</head>

<body>
<div class="preloader">
    <img src="img/logo.png" alt="logo">
</div>