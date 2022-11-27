<?php 

# Functions for avoid the algorithm project

/*
Data base connection

*/

#mongodb://localhost:27017/

function connect_mongodb($host = "mongodb+srv://james_attwood:7tadZOaBzo94zUeZ@avoidthealgorithm1.jsu1na6.mongodb.net/?retryWrites=true&w=majority") {

		$connection = new MongoDB\Client($host);

		return $connection;
	}


####################################################




?>
