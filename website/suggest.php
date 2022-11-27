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

	:root {

			--blue: #1a2238;
			--purple: #9daaf2;
			--orange: #ff6a3d;
			--yellow: #f4db7d;
		}

	body {

			background-color: var(--blue);
			font-family: Lucida Console;
	}
		
	.boundary {

			margin-top: 5%;
			margin-bottom: 5%;
			margin-left: 20%;
			margin-right: 20%;

	}

	.bottombuttons {
			text-align: center;
			margin-top: 30px;

		}

		.bottombuttons a {
			margin-left: 1%;
			margin-right: 1%;
			color: white;

		}

		.bottombuttons a:hover {

  			font-weight: bold;
  			background-color: var(--orange);
  			padding: 1% 2% 1%;
  			text-justify: inter-word;
			border-style: outset;
			border-color: black;


		}

		.articleinfo {
			text-align: justify;
			text-justify: inter-word;
			border-style: outset;
			border-color: black;
			margin-top: 40px;
			background-color: white;
			padding: 15px 30px 20px;
			color: var(--blue);
			

		}

		form { 
			margin-top: 20px;

		}

		label {
			color: white; 
			margin-top: 30px;
		}


		input {
			color: black;
			margin-top: 15px;
			font-family: Lucida Console;
			width: 300px;
			height: 30px;
			border-style: outset;
			border-color: black;
			font-weight: bold;


		}

		button { 
			background-color: var(--purple);
			border-style: outset;
			border-color: black;
			padding: 10px;
			font-weight: bold;

		}

		button:hover {
			padding: 15px;
			color: var(--orange);
			background-color: white;
		}

/*		.articleinfo {
			
			border-style: outset;
			border-color: black;
			margin-top: 40px;
			background-color: white;
			padding: 15px 30px 20px;
			color: var(--blue);
		
		}*/





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

	<div class = "boundary">
		

		<<div class="bottombuttons">
		  		<a href="../index.php">Home</a>
		  		<a href="vote.php">React</a>
		  		<a href="previous.php">Previous</a>
		  		<a href="suggest.php">Suggest</a>
		  		<a href="premium.php">Premium</a>
		  		<a href="logout.php">Logout</a>
		</div> 

		<div class="articleinfo">
			<H3>Suggest a source:</H3>
			<b>Do you know a particular blog or website that does interesting articles? Do you want to share this interesting knowledge with others?</b>
			<b>Then make a us suggestion of a site you want to see include in the pool of sources used by avoidthealgorithm.</b>
			<b>Fill out the form below!</b>
		</div>

		<form action = "suggest.php" method="post">
			<label class = "label1">Source: </label>
			<input class = "text" type="text" name="source", id = "source", placeholder="www.bbc.co.uk" required><br><br>
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
	  		<br><br>
	  		<button type="submit">Submit
	  		</button>  
		</form>


	</div>


</body>
</html>