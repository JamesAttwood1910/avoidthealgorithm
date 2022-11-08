<?php

session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
</head>
<body>

	<?php

	require_once __DIR__ . '/vendor/autoload.php';

	require("functions/functions.php");

	$collection = connect_mongodb()->news_db->users;

	$email = isset($_POST["email"] ) ? $_POST["email"]: '';

	$password = isset($_POST["password"] ) ? $_POST["password"]: '';

	$cursor = $collection->find(
		[
			'email' => $email

		]
	);


	foreach ($cursor as $doc) {

		$password_users = $doc->password;
		$first_name = $doc->First_name;
		# code...
	}


	if (password_verify($password, $password_users)) {

		$_SESSION["loggedin"] = true;
		$_SESSION["email"] = $email;
		$_SESSION['user'] = $first_name;

		header("location: website/vote.php");
	} else {

		echo "Oops! Something went wrong. Please try again later.";

	}












	?>






</body>
</html>