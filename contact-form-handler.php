<?php
$name =$_Post['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];


$email_form = 'Awaist5558@gmail.com';

$email_subject ='New From Submission';

$email_body ="User Name: $name.\n".
            "User Email: $visitor_email.\n".
    "User Message: $message.\n";

$to ="Awaismehmood01@gmail.com";
$headers ="Form: $email_form \r\n";

$headers ="Reply-To: $visitor_email \r\n";

mail($to,$email_subject,$email_body,$headers);
header("Location: index.html");

?>