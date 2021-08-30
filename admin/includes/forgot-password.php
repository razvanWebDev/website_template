<?php include "../../PHP/db.php" ?>
<?php include "functions.php" ?>

<?php
if(isset($_POST['forgot-password-submit'])) {
    // create tokens
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = $website_url . "/admin/create-new-password.php?selector=$selector&validator=" . bin2hex($token);
    $expires = date("U") + 1800; //60min

    $userEmail = escape($_POST['email']);

    //delete privious tokens
    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error";
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    //insert token into DB
    $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?)"; 
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error";
        exit();
    }else{
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    //close prepared statements
    mysqli_stmt_close($stmt);
    //close connection
    mysqli_close($connection);

    // ========SEND EMAIL=========
    $to = $userEmail;
    $subject = "Password reset";

    $message = '<p>We received a password request. The link to reset your password is bellow.
    </br>If you did not make this request, you can ignore this email</p>';
    $message .= '<p>Here is your password reset link: </br>';
    $message .= '<a href="'. $url .'">'. $url . '</a></p>';

    $headers = "From: website <website@gmail.com>\r\n";
    $headers .= "Reply-To: website@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: ../forgot-password.php?reset=success");


}else{
    header("Location: ../index.php");
}
