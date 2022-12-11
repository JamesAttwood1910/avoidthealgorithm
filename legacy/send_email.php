 <?php
// the message
$msg = "First line of text <br> Second line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("attwood1910@gmail.com","My subject",$msg);
?> 