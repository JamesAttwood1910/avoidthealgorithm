<?php 

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 

	require_once('../../vendor/autoload.php');
	
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

	$dotenv->load();

	require("../../functions/functions.php");

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	$collection = connect_mongodb()->news_db->users;

	$date = date_create();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['send'])) {
			
			$email = isset($_POST["email"] ) ? $_POST["email"]: '';

			$_SESSION["reset_email"] = $email;

			$cursor = $collection->findOne(["email"=>$email]);

			if($cursor){
				 # generate random code

				 $react_code = uniqid();

				 $_SESSION["react_code_sent"] = $react_code;

				 # get user name 


				# send email to user with code

				$receiver = $email;
				$subject = "Reset Password - avoidthealgorithm";
				$body = "Hi we have received a request to reset your password for avoidthealgorithm. Your reset code is {$react_code}." ;
				$sender = "From:avoidthealgorithm@gmail.com";

				if(mail($receiver, $subject, $body, $sender)){
    		
    				header("location: reactivation_code.php");
    			}

				# store code in databse for 20 minutes. Then delete

				$collection_reset = connect_mongodb()->news_db->reset_password;

				$insert = $collection_reset->insertOne([

					'user_email' => $email,
					'Timestamp' =>  $date->getTimestamp(),
					'code' => $react_code,
				]);

				header("location: reactivation_code.php");

			} else {
				header("location: no_email_in_db.php");
			}
		}
	}

	// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	// 	if (isset($_POST['submit_reactivation'])) {

	// 		$code = isset($_POST["code"] ) ? $_POST["code"]: '';

	// 		$cursor = $collection_reset->findOne(["user_email"=> $email]);

	// 		if ($cursor) {
	// 			header("location: enter_new_password.php");
	// 		} else {
	// 			header("reset_code_incorrect.php");
	// 		}


	// 		# check if code is the same code that is stored in db for that user. if so then send to password reset page. 

	// 		# in password reset page they can get update their password which updates the db. 

	// 		# THey are also emailed their new password. 

	// 	} 


	// }



// $cursor = $collection->findOne($findemail);

// if($cursor){
//     if($cursor->email == $email and $cursor->password == $password){   
//         echo "success";
//     }
// }




	 ?>

</body>
</html>