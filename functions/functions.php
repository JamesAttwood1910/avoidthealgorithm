<?php 

# Functions for avoid the algorithm project

/*
Data base connection

*/

function connect_mongodb($host = "mongodb://localhost:27017/") {

		$connection = new MongoDB\Client($host);

		return $connection;
	}


####################################################




?>
