<?php 

# Functions for avoid the algorithm project

/*
Data base connection

*/

#mongodb://localhost:27017/

function connect_mongodb($host = "mongodb+srv:////username:7tadZOaBzo94zUeZ@urlToCluster/?ssl=true&authSource=admin") {

		$connection = new MongoDB\Client($host);

		return $connection;
	}

// function connect_mongodb($host = 'mongodb+srv://james_attwood:7tadZOaBzo94zUeZ@avoidthealgorithm1.jsu1na6.mongodb.net/?retryWrites=true&w=majority') {
// 	$serverApi = new ServerApi(ServerApi::V1);
// 	$connection = new MongoDB\Client(
//     $host, [], ['serverApi' => $serverApi]);
//     return $connection
// }
####################################################




?>