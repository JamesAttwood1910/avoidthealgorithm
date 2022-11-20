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
	<title>Previous</title>

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
  			padding: 2% 2%;
  			text-justify: inter-word;
			border-style: outset;
			border-color: black;

		}

		H4 {
			text-align: left;
			width: 120px;
			border-style: outset;
			border-color: black;
			padding: 20px 30px;
			color: white;
		}

        .article_boundary { 
        	text-align: center;
        	margin-top: 20px;


         }

         .article_bound_components {
         	margin-left: 25px;
			margin-right: 25px;
			color: white;


         }

         .article_boundary a {
          	background-color: var(--orange);
          	padding: 2px 2px;

          }

          .article_boundary span {
          	padding-top: 10px; 
          	padding-bottom: 10px;

          }

         
	
	</style>

</head>
<body>

	<?php 

	require_once '../vendor/autoload.php';

	require("../functions/functions.php");

	#$date = date("Y-m-d");

	#$date_prior = date( "Y-m-d", strtotime( $date . "-2 day"));

	$collection = connect_mongodb()->news_db->sent_articles;

	$collection2 = connect_mongodb()->news_db->news_articles;

	// $options = ['sort' => ['date_sent' => -1], 'limit' => 1];

	$query = array('user_email' => $_SESSION['email']);

	$cursor = $collection->find($query, array('sort' => ['date_sent' => -1], 'limit'=>5));

	$titles = array();
	$links = array();
	$dates_sent = array();
	$reactions = array();

	foreach ($cursor as $doc) {
		// var_dump($doc);

		$date_sent = $doc->date_sent;
		$dates_sent[] = $date_sent;

		// $reaction = $doc->reaction;
		// $reactions = $reaction;

		$article = $doc->articleID;

		$cursor2 = $collection2->find(
			array('_id' => new MongoDB\BSON\ObjectID($article))
		);

		foreach ($cursor2 as $doc2) {
			
			$article_title = $doc2->title;
			$titles[] = $article_title;

			$article_link = $doc2->url;
			$links[] = $article_link;

		}


	}

	?>

	<div class = "boundary">

		<div class="bottombuttons">
	  		<a href="http://localhost/phpmongodb/website/home.php">Home</a>
	  		<a href="http://localhost/phpmongodb/website/vote.php">React</a>
	  		<a href="http://localhost/phpmongodb/website/previous.php">Previous</a>
	  		<a href="http://localhost/phpmongodb/website/suggest.php">Suggest</a>
	  		<a href="http://localhost/phpmongodb/website/premium.php">Premium</a>
	  		<a href="http://localhost/phpmongodb/website/logout.php">Logout</a>
		</div> 

		<div class="articleinfo">
			<H3>Your last five articles are: </H3>

		</div>

		<div class = "article_boundary">
	    <span class = "article_bound_components"> <?php echo $dates_sent[0]  ?> </span>
	    <a class = "article_bound_components" href="<?php echo $links[0]  ?>"> <?php echo $titles[0]  ?></a>
	    <!-- <span class = "article_bound_components">Reaction Score</span> -->
	    </div>

	    <div class = "article_boundary">
	    <span class = "article_bound_components"> <?php echo $dates_sent[1]  ?> </span>
	    <a class = "article_bound_components" href="<?php echo $links[1]  ?>"> <?php echo $titles[1]  ?></a>
	    <!-- <span class = "article_bound_components">Reaction Score</span> -->
	    </div>

	    <div class = "article_boundary">
	    <span class = "article_bound_components"> <?php echo $dates_sent[2]  ?> </span>
	    <a class = "article_bound_components" href="<?php echo $links[2]  ?>"> <?php echo $titles[2]  ?></a>
	    <!-- <span class = "article_bound_components">Reaction Score</span> -->
	    </div>

	    <div class = "article_boundary">
	    <span class = "article_bound_components"> <?php echo $dates_sent[3]  ?> </span>
	    <a class = "article_bound_components" href="<?php echo $links[3]  ?>"> <?php echo $titles[3]  ?></a>
	    <!-- <span class = "article_bound_components">Reaction Score</span> -->
	    </div>

	    <div class = "article_boundary">
	    <span class = "article_bound_components"> <?php echo $dates_sent[4]  ?> </span>
	    <a class = "article_bound_components" href="<?php echo $links[4]  ?>"> <?php echo $titles[4]  ?></a>
	    <!-- <span class = "article_bound_components">Reaction Score</span> -->
	    </div>


	</div>
</body>
</html>