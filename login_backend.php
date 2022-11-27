<?php

session_start(); # Start session - to store user info to be used across multiple pages. 

?>


<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
</head>
<body>

	<?php

	require_once 'vendor/autoload.php';

	require("functions/functions.php");

	$collection = connect_mongodb()->news_db->users; # get users collection;

	$email = isset($_POST["email"] ) ? $_POST["email"]: '';

	$password = isset($_POST["password"] ) ? $_POST["password"]: '';

	$cursor = $collection->find(
		[
			'email' => $email # get user using email entered in login. 

		]
	);


	foreach ($cursor as $doc) {

		$password_users = $doc->password; # get users password saved in collection
		$first_name = $doc->First_name; # get users first name saved in collection
		# code...
	}


	if (password_verify($password, $password_users)) { # verify if users password entered is same as that saved in collection. 

		$_SESSION["loggedin"] = true; #set loggedin as true
		$_SESSION["email"] = $email; 
		$_SESSION['user'] = $first_name;

		header("location: website/vote.php")
		echo "this worked"; # send to voting page
	} else {

		$_SESSION["loggedin"] = false;
		header("location: website/login_failed.php"); # if loggin fails then send to something went wrong login page. 

	}












	?>






</body>
</html>