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

	$collection_reset = connect_mongodb()->news_db->reset_password;

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		if (isset($_POST['submit_reactivation'])) {

			$code = isset($_POST["code"] ) ? $_POST["code"]: '';

			$options = ['sort' => ['timestamp' => -1], 'limit' => 1];

			$filter = ["user_email"=> $_SESSION['reset_email'], "code"=>$_SESSION["react_code_sent"]];

			$cursor = $collection_reset->findOne($filter, $options);

			if ($cursor) {
				header("location: enter_new_password.php");
			} else {
				header("reset_code_incorrect.php");
			}
		}
	}

	?>

</body>
</html>