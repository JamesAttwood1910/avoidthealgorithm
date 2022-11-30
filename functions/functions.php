<?php 

# Functions for avoid the algorithm project

/*
Data base connection

*/
// # Local host:
// 	function connect_mongodb($host = 'mongodb://localhost:27017') {
// 		$connection = new MongoDB\Client($host);
// 	    return $connection;
// 	}

# Mongo Atlas Cloud Connection
	function connect_mongodb() {
		$connection = new MongoDB\Client($_ENV['MONGODB_URI']);
		return $connection;

	}
		
####################################################


?>