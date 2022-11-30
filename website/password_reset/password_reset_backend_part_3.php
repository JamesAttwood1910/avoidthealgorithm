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

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		if (isset($_POST["password"]) || isset($_POST["confirm_password"])) {

			$password = isset($_POST["password"] ) ? $_POST["password"]: '';
			$password_confirm = isset($_POST["confirm_password"] ) ? $_POST["confirm_password"]: '';

			if ($password == $password_confirm) {

				$password_hash = password_hash($password, PASSWORD_DEFAULT);

				$collection = connect_mongodb()->news_db->users;

				$update_result = $collection->updateOne(['email'=>$_SESSION['reset_email']], ['$set' => ['password' => $password_hash]]);

				$receiver = $_SESSION['reset_email'];
				$subject = "New Password - avoidthealgorithm";
				$body = "Hi your new password for avoidthealgorithm is {$password}." ;
				$sender = "From:avoidthealgorithm@gmail.com";

				if(mail($receiver, $subject, $body, $sender)){
    		
    				header("location: ../../login_page.php");
    			}



			} else {
				echo "<script type='text/javascript'>alert('The passwords you entered did not match. Please try again.');</script>";
			}
		}
	}

	?>

</body>
</html>