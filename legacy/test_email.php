<?php
$name = "james";
$receiver = "attwood1910@gmail.com";
$subject = "Email Test via PHP using Localhost";
$body = "Hello ${name} how are you?";
$sender = "From:avoidthealgorithm@gmail.com";
if(mail($receiver, $subject, $body, $sender)){
    echo "Email sent successfully to $receiver";
}else{
    echo "Sorry, failed while sending mail!";
}
?>