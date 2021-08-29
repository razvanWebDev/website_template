<?php include "db.php";?>
<?php include "../admin/includes/functions.php";?>

<?php
if(isset($_POST['submit'])) {
  //check captcha
  $captcha = getCaptcha($secret_key, $_POST['g-recaptcha-response']);

  //Captcha passed
  if($captcha->success == true && $captcha->score > 0.5){
    $email_to = "razvan.crisan@ctotech.io, crsn_razvan@yahoo.com";
    $email_subject = "New message from Your website!";

    //form data 
    $name = escape($_POST['name']); 
    $lastName = escape($_POST['lastName']);
    $phone = escape($_POST['phone']);
    $email = escape($_POST['email']); 
    $message = escape($_POST['message']);

    //Own Email==========================================  
    $email_message = "Message details.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "Name: ".clean_string($name)." ".clean_string($lastName)."\n";
    $email_message .= "Phone: ".clean_string($phone)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Message: ".clean_string($message)."\n\n";
         
    // create email headers
    $headers = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_subject, $email_message, $headers);  

    //DB contact=======================================================

    $query = "INSERT INTO contact (firstname, lastname, email, phone, message) ";
    $query .= "VALUES ('{$name}', '{$lastName}', '{$email}', '{$phone}', '{$message}')";

    $result =  mysqli_query($connection, $query);

    if(!$result) {
    die("DB query failed" . mysqli_error());
    }

    header("Location: ../contact");

  }else{
    //Captcha failed
    header("Location: ../contact?error=captcha_failed");
  }
  mysqli_close($connection);   
}

die();
?>