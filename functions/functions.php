<?php 

# Functions for avoid the algorithm project

/*
Data base connection

*/

#mongodb://localhost:27017/

function connect_mongodb($host = "mongodb://localhost:27017/") {

		$connection = new MongoDB\Client($host);

		return $connection;
	}


####################################################




?>
