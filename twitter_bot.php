<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php  

	require("vendor/autoload.php");

	require("functions/functions.php");


	use Abraham\TwitterOAuth\TwitterOAuth;

	#####################################

	$connection = new TwitterOAuth("R05UUldwQlE5VkNqYlZhdC0ySXM6MTpjaQ", "R05UUldwQlE5VkNqYlZhdC0ySXM6MTpjaQ", "PC0AAGwd70zHRsOdsjoPFx7k7", "9ntSjGndqPrmLHznpnRosv2moMS3o1aIz1U0msaUe77eVtBhKd");

	$content = $connection->get("account/verify_credentials");

	######################################

	echo $content;




	?>
	
</body>
</html>