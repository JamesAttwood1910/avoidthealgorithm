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

	.article {
		float: left;
		margin-left: 350px;
		margin-right: 300px;
		margin-top: 10px;
		border-style: outset;
		border-color: #FAF3E3;
		padding: 8px;
		overflow: hidden;
		color: #000000;
		font-family: Lucida Console;
		background-color: #FF9F29;
	}

	.article_links {
		float: left;
		margin-left: 470px;
		position: relative;
		bottom: 30px;
		color: #000000;
		font-family: Lucida Console;;
	}

	.article_links:hover {
		color: #FF9F29;
	}



</style>

</head>
<body>

	<?php 

	require_once '../vendor/autoload.php';

	require("../functions/functions.php");

	$date = date("Y-m-d");

	$date_prior = date( "Y-m-d", strtotime( $date . "-2 day"));

	$collection = connect_mongodb()->news_db->sent_articles;

	$collection2 = connect_mongodb()->news_db->news_articles;

	$cursor = $collection->find(

		array('user_email' => $_SESSION["email"],
			'date_sent' => array('$gte' => $date_prior,
							'$lte' => $date))
	);


	$titles = array();
	$links = array();
	$dates_sent = array();

	foreach ($cursor as $doc) {

		$article = $doc->articleID;

		$date_sent = $doc->date_sent;
		$dates_sent[] = $date_sent;

		$cursor2 = $collection2->find(
			[
				'_id' => new MongoDB\BSON\ObjectID($article)

			]

		);

		foreach ($cursor2 as $doc2) {
			
			$article_title = $doc2->title;
			$titles[] = $article_title;

			$article_link = $doc2->url;
			$links[] = $article_link;

		}

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
	<H3>Your last five articles are: </H3>
</div>

<div class = "article"> Article 1</div>
<a class = "article_links" href="<?php echo $links[0];?>"><?php echo $titles[0]; echo " (".$dates_sent[0].")";?></a>
<div class = "article"> Article 2</div>
<a class = "article_links" href="<?php echo $links[1];?>"><?php echo $titles[1]; echo " (".$dates_sent[1].")";?></a>

</body>
</html>