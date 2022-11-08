<?php 

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

	header("location: ../login_page.php");
	exit;
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Suggest</title>

<style type="text/css">

	body {
		background-color: #1A4D2E;
	}


	.bottombuttons {

			float: left;
			margin-left: 360px;
			margin-top: 40px;
			overflow: hidden;
			
		}

	.bottombuttons a {

			font-family: Lucida Console;
			color: #FAF3E3;
			margin-left: 25px;
			margin-right: 25px;
		}

	.bottombuttons a:hover {

  			color: #000000;
		}
	
	.articleinfo {
		float: left;
		margin-left: 350px;
		margin-right: 300px;
		margin-top: 50px;
		border-style: outset;
		border-color: #FAF3E3;
		padding: 8px;
		overflow: hidden;
		color: #FAF3E3;
		font-family: Lucida Console;
	}

	.label1 {
		float: left;
		margin-left: 350px;
		margin-right: 300px;
		margin-top: 50px;
		font-family: Lucida Console;
		color: #FAF3E3;
	}

	.label2 {
		float: left;
		margin-left: 350px;
		margin-right: 300px;
		font-family: Lucida Console;
		color: #FAF3E3;
	}
	.text {
		float: left;
		margin-left: 550px;
		margin-right: 300px;
		font-family: Lucida Console;
		color: #FAF3E3;
		position: relative;
		bottom: 20px;
		height: 40px;
		width: 400px;
		padding-left: 10px;
	}

	.text:focus {
		outline: none;
		border-color: #FAF3E3;
		background-color: #FF9F29;
		border-style: solid;
		color: #000000;
	}

	.text:valid {
		outline: none;
		border-color: #FAF3E3;
		background-color: #FF9F29;
		border-style: solid;
		color: #000000;
	}

	.options {
		float: left;
		margin-left: 750px;
		margin-right: 300px;
		font-family: Lucida Console;
		color: #FAF3E3;
		position: relative;
		bottom: 20px;
		height: 20px;
		width: 200px;
		padding-left: 7px;
	}

	.options:focus {
		outline: none;
		border-color: #FAF3E3;
		background-color: #FF9F29;
		border-style: solid;
		color: #000000;
	}

	.options:valid {
		outline: none;
		border-color: #FAF3E3;
		background-color: #FF9F29;
		border-style: solid;
		color: #000000;
	}

	.submit {
		float: left;
		margin-left: 750px;
		margin-right: 300px;
		margin-top: 10px;
		padding-top: 5px;
		padding-bottom: 5px;
		font-family: Lucida Console;
		background-color: #FF9F29;
		color: #000000;
	}

	.submit:hover {

		color: #000000;
		background-color: #FAF3E3;
		border-color: #000000;
	}




</style>

</head>
<body>

	<?php  
	
	require_once '../vendor/autoload.php';

	require("../functions/functions.php");

	$date = date_create();

	$collection = connect_mongodb()->news_db->suggested_sources;

	$source = isset($_POST["source"] ) ? $_POST["source"]: '';

	$source_topic = isset($_POST["source_topic"] ) ? $_POST["source_topic"]: '';

	if(!empty($source) && !empty($source_topic)){

		$insertOneResult = $collection->insertOne([

			'suggestion_date' => $date->getTimestamp(),
			'source' => $source,
			'topic' => $source_topic,
			'user' => $_SESSION['email']

		]);

		echo "<script>alert('Thank you for submitting your suggestion.');</script>";


	}




	?>

	<div class="bottombuttons">
  		<a href="http://localhost/phpmongodb/website/home.php">Home</a>
  		<a href="http://localhost/phpmongodb/website/vote.php">React</a>
  		<a href="http://localhost/phpmongodb/website/previous.php">Previous</a>
  		<a href="http://localhost/phpmongodb/website/suggest.php">Suggest</a>
  		<a href="http://localhost/phpmongodb/website/premium.php">Premium</a>
	</div> 

	<div class="articleinfo">
		<H3>Suggest a source:</H3>
		<b>Do you know a particular blog or website that does interesting articles? Do you want to share this interesting knowledge with others?</b>
		<b>Then make a us suggestion of a site you want to see include in the pool of sources used by avoidthealgorithm.</b>
		<b>Fill out the form below!</b>
	</div>

	<form action = "suggest.php" method="post">
		<label class = "label1">Source: </label>
		<input class = "text" type="text" name="source", id = "source", placeholder="www.bbc.co.uk" required><br>
		<label class = "label2">What topic best describes this source: </label>
		<input class = "options" list="source_topic", name = "source_topic", placeholder="Double click for options" required>
  		<datalist id="source_topic">
    	<option value="entertainment">
    	<option value="science">
    	<option value="technology">
    	<option value="disability">
    	<option value="business">
    	<option value="arts">
    	<option value="health">
    	<option value="sport">
  		</datalist>
  		<input class = "submit" type="submit", value = "Submit">
	</form>

</body>
</html>