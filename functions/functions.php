<?php 

# Functions for avoid the algorithm project

/*
Data base connection

*/

#mongodb://localhost:27017/

// function connect_mongodb($host = "mongodb://localhost:27017/") {

// 		$connection = new MongoDB\Client($host);

// 		return $connection;
// 	}

	function connect_mongodb($host = 'mongodb+srv://admin:TM4S3PwGsROwUJbT@avoidthealgorithm1.mongodb.net/news_db?retryWrites=true&w=majority') {
		$serverApi = new ServerApi(ServerApi::V1);
		$connection = new MongoDB\Client(
	    $host, [], ['serverApi' => $serverApi]);
	    return $connection;
	}
####################################################


?>