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
	<title>Vote</title>

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
		margin-left: 310px;
		margin-right: 300px;
		margin-top: 50px;
		border-style: outset;
		border-color: #FAF3E3;
		padding: 15px;
		overflow: hidden;
		color: #FAF3E3;
		font-family: Lucida Console;
	}

	.articleinfo a {
		color: #000000;
	}

	.articleinfo a:hover {
		color: #FF9F29;
		

	}

	.react1 {
		float: left;
		margin-left: 480px;
		margin-right: 300px;
		margin-top: 50px;
		border-style: outset;
		border-color: #FAF3E3;
		padding: 15px;
		overflow: hidden;
		color: #FAF3E3;
		font-family: Lucida Console;
	}

	.react2 {
		float: left;
		margin-left: 370px;
		margin-right: 180px;
		margin-top: 50px;
		border-style: outset;
		border-color: #FAF3E3;
		padding: 15px;
		overflow: hidden;
		color: #FAF3E3;
		font-family: Lucida Console;
	}

	.button {
		margin-top: 15px;
		margin-bottom: 15px;
		margin-left: 10px;
		margin-right: 10px;
		background-color: #FF9F29;
		padding: 5px;
		font-family: Lucida Console;
		color: #000000; 
	}

	.button:hover {
		margin-top: 15px;
		margin-bottom: 15px;
		margin-left: 10px;
		margin-right: 10px;
		background-color: #000000;
		padding: 5px;
		font-family: Lucida Console;
		color: #FF9F29;
	}



</style>
</head>
<body>

<?php 

	require_once '../vendor/autoload.php';

	require("../functions/functions.php");

	$date = date("Y-m-d");

	$date_test = "2022-11-08";

	$collection = connect_mongodb()->news_db->sent_articles;

	$collection2 = connect_mongodb()->news_db->news_articles;

	$cursor_1 = $collection->find(

		array('user_email' => $_SESSION["email"],
			'date_sent' => $date_test)
	);

	$count  = 0;

	foreach ($cursor_1 as $document) {
    	$count++;
	}

	echo $count;

	if ($count == 1) {

		$cursor = $collection->find(

			array('user_email' => $_SESSION["email"],
				'date_sent' => $date_test)
		);


		foreach ($cursor as $doc) {

			$article = $doc->articleID;

			$cursor2 = $collection2->find(
				[
					'_id' => new MongoDB\BSON\ObjectID($article)

				]

			);

			foreach ($cursor2 as $doc2) {
				
				$article_title = $doc2->title;
				$article_link = $doc2->url;

			}

		}

		function update_awesome() {

			global $collection;
			global $article;

			$result_update_sent_reaction = $collection->updateMany( [ 'user_email' => $_SESSION["email"], 
					'articleID' => $article],
				
				[ '$set' => [ 'reaction' => 2]]

			);
		}

		function update_good() {

			global $collection;
			global $article;

			$result_update_sent_reaction = $collection->updateMany( [ 'user_email' => $_SESSION["email"], 
					'articleID' => $article], 
				[ '$set' => [ 'reaction' => 1]]

			);
		}

		function update_meh() {

			global $collection;
			global $article;

			$result_update_sent_reaction = $collection->updateMany( [ 'user_email' => $_SESSION["email"], 
					'articleID' => $article], 
				[ '$set' => [ 'reaction' => 0]]

			);
		}

		function update_terrible() {

			global $collection;
			global $article;

			$result_update_sent_reaction = $collection->updateMany( [ 'user_email' => $_SESSION["email"], 
					'articleID' => $article], 
				[ '$set' => [ 'reaction' => -1]]

			);
		}	

		if(array_key_exists('button1', $_POST)) {

				update_awesome();

			} else if(array_key_exists('button2', $_POST)) {

				update_good();
			} else if(array_key_exists('button3', $_POST)) {

				update_meh();
			} else if(array_key_exists('button4', $_POST)) {

				update_terrible();
			}
	} else {
		echo "your article of the day has not been sent yet";
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
	<H3>Hi <?php echo $_SESSION["user"]?></H3>
	<b>Your article of the day was <a href="<?php echo $article_link;?>"><?php echo $article_title;?></a>.</b>
</div>

<div class="react1">
	<b>React using the buttons below.</b>
</div>

<div class="react2">
	<b>My article of the day was a ...</b>
	<form method="post">
	        <input type="submit" name="button1"
	        class="button" value="Awesome read" />
	        
	        <input type="submit" name="button2"
	        class="button" value="Good read" />

	        <input type="submit" name="button3"
	        class="button" value="Meh read" />	        
	          
	        <input type="submit" name="button4"
	        class="button" value="Terrible read" />
	</form>
</div>




</body>
</html>