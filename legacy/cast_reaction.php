<?php 

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

	header("location: login_page.php");
	exit;
}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 

	require_once __DIR__ . '/vendor/autoload.php';

	require("functions/functions.php");

	$date = "2022-10-28";

	$collection = connect_mongodb()->news_db->sent_articles;

	$collection2 = connect_mongodb()->news_db->news_articles;

	$cursor = $collection->find(

		array('user_email' => $_SESSION["email"],
			'date_sent' => $date)
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

	?>

	<h2>Hi <b><?php echo $_SESSION["user"]?></b>. Welcome to your avoid the algorithm reactions page.</h2>

	<b>Your article of the day was <?php echo $article_title;?>.</b> <br>
	<br>
	<b>Here is the <a href="<?php echo $article_link;?>">link</a> in case you want to read it again before reacting.</b><br>
	<br>
	<b>Using the buttons below tell us of your reaction to this article.</b>

	<?php

	function update_plus() {

		global $collection;
		global $article;

		$result_update_sent_reaction = $collection->updateOne( [ 'user_email' => $_SESSION["email"], 
				'articleID' => $article],
			
			[ '$set' => [ 'reaction' => 1]]

		);
	}

	function update_minus() {

		global $collection;
		global $article;

		$result_update_sent_reaction = $collection->updateOne( [ 'user_email' => $_SESSION["email"], 
				'articleID' => $article], 
			[ '$set' => [ 'reaction' => -1]]

		);
	}


	if(array_key_exists('button1', $_POST)) {

			update_plus();

		} else if(array_key_exists('button2', $_POST)) {

			update_minus();

	}
?>

<br>
<br>
<form method="post">
        <input type="submit" name="button1"
                class="button" value="Interesting" />
          
        <input type="submit" name="button2"
                class="button" value="Boring" />
</form>


</body>
</html>