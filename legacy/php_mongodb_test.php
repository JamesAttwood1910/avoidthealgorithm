<!DOCTYPE html>
<html>
<head>
	<title>
		Pushing button click to mongodb collection. 
	</title>
</head>
<body>
	<h1>Pushing a button click to a mongodb collection</h1>

	<p>Did you enjoy the article? Tell us your opinion. </p>


<?php
	require_once __DIR__ . '/vendor/autoload.php';

	function connect_mongodb($host = "mongodb://localhost:27017/") {

		$connection = new MongoDB\Client($host);

		return $connection;
	}

	$collection = connect_mongodb()->news_db->sent_articles;

	function update_plus() {

		global $collection;

		$result_update_sent_reaction = $collection->updateOne( [ '_id' => new \MongoDB\BSON\ObjectID('63489a05ac8307593640d5cf')], 
			[ '$set' => [ 'reaction' => 1]]

		);
	}

	function update_minus() {

		global $collection;

		$result_update_sent_reaction = $collection->updateOne( [ '_id' => new \MongoDB\BSON\ObjectID('63489a05ac8307593640d5cf')], 
			[ '$set' => [ 'reaction' => -1]]

		);
	}



	if(array_key_exists('button1', $_POST)) {


		$count = 0;

		while($count <= 2) {

			update_plus();

			$count++;
		} 

    }
    else if(array_key_exists('button2', $_POST)) {
        
        $count = 0;

        while($count <= 2) {


        	update_minus();

        	$count++;
        }    
    }
?>

<form method="post">
        <input type="submit" name="button1"
                class="button" value="Interesting" />
          
        <input type="submit" name="button2"
                class="button" value="Boring" />
</form>



</body>
</html>
