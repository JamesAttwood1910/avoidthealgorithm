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

	require_once('../vendor/autoload.php');

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['yes'])) {
			session_destroy();
			header("location: ../login_page.php"); 

		} else if (isset($_POST['no'])) {
			header("location: home.php");

		}
	}

	?>






</body>
</html>