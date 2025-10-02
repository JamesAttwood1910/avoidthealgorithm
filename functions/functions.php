<?php 

# Functions for avoid the algorithm project

/*
Data base connection

*/

#mongodb://localhost:27017/

function connect_mongodb($host = "mongodb+srv://$USER:$KEY.mongodb.net/?retryWrites=true&w=majority") {

		$connection = new MongoDB\Client($host);

		return $connection;
	}


####################################################




?>
