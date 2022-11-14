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
		:root {

            --blue: #1a2238;
            --purple: #9daaf2;
            --orange: #ff6a3d;
            --yellow: #f4db7d;
        }

        body {

            background-color: var(--blue);
            font-family: Lucida Console;
            color:white;
        }
        
        .boundary {

            padding-top: 5%;
            padding-bottom: 5%;
            padding-left: 20%;
            padding-right: 20%;

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

		.react1 {
			margin-top: 40px;
		}

		.react2 {
			margin-top: 30px;
			text-align: center;
		}

		.react2 form {
			margin-top: 15px;
			text-align: center;
			margin-top: 30px;
		}

		.react2 input {
			padding: 5px;
			margin: 3px 0px;
            border-style: outset;
            border-color: black;
            background-color:var(--purple);
            font-family: Lucida Console;
            color: white;
            font-weight: bold;
		}

		.react2 input:hover {
			padding: 10px;
			color: var(--orange);
			background-color: white;

		}

		.articleinfo a {
			color: var(--orange);
		}

		.articleinfo a:hover {

            color: var(--purple);
          
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

	<div class = "boundary">


		<div class="bottombuttons">
		  		<a href="http://localhost/phpmongodb/website/home.php">Home</a>
		  		<a href="http://localhost/phpmongodb/website/vote.php">React</a>
		  		<a href="http://localhost/phpmongodb/website/previous.php">Previous</a>
		  		<a href="http://localhost/phpmongodb/website/suggest.php">Suggest</a>
		  		<a href="http://localhost/phpmongodb/website/premium.php">Premium</a>
		</div> 

		<div class="articleinfo">
			<H3>Hi <?php echo $_SESSION["user"]?></H3>
			<b>Your article of the day was: <a href="<?php echo $article_link;?>"><?php echo $article_title;?></a></b>
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
	</div>



</body>
</html>