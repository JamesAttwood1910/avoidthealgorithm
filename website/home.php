<!DOCTYPE html>
<html>
<head>
	<style type="text/css">

		:root {

			--blue: #1a2238;
			--purple: #9daaf2;
			--orange: #ff6a3d;
			--yellow: #f4db7d;
		}

		body {

			background-color: var(--blue);
			font-family: Lucida Console;
		}
		
		.boundary {

			margin-top: 5%;
			margin-bottom: 5%;
			margin-left: 20%;
			margin-right: 20%;

		}

		.title {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		h1 {
			text-align: center;
			background-color: var(--orange);
			border-style: outset;
			border-color: black;
			padding: 0.25% 1% 0.25%;
			color: white;
		}

		p {
			text-align: justify;
			text-justify: inter-word;
			border-style: outset;
			border-color: black;
			background-color: white;
			padding: 30px;
			color: var(--blue);
		}

		.bottombuttons {
			text-align: center;
			margin-top: 30px;

		}

		.bottombuttons a {
			margin-left: 1%;
			margin-right: 1%;
			color: white;

		}

		.bottombuttons a:hover {

  			font-weight: bold;
  			background-color: var(--orange);
  			padding: 1% 2% 1%;
  			text-justify: inter-word;
			border-style: outset;
			border-color: black;


		}

		.twitter_bot {
			display: flex;
			justify-content: center;
			align-items: center;
			margin-top: 70px;
		}

		.twitter_bot b {
			width: 200px;
			padding: 1% 2% 1%;
			text-align: center;
			border-style: outset;
			border-color: black;
			background-color: var(--purple);

		}

		.twitter_bot a {

			text-decoration:none;
			color: black;
		}

		.twitter_bot a:hover {

			text-decoration:none;
			color: white;
		}



	</style>
	<title>
		Avoidthealgorithm
	</title>

</head>
<body>

	<div class = boundary>
			<div class = title>
				<h1> Avoid the Algorithm </h1>

			</div>

			<p>
				<b>Welcome to Avoid the Algorithm. The place for un-algorithmed news and interesting information. Avoid the overflow of information and ensure you keep your mind fresh by reading at least one article a day. 

				React to your daily article, suggest sources, view your previous articles and check out our premium service. 

				Happy reading.
				</b> 
			</p>

		<div class="bottombuttons">
	  		<a href="http://localhost/phpmongodb/website/home.php">Home</a>
	  		<a href="http://localhost/phpmongodb/website/vote.php">React</a>
	  		<a href="http://localhost/phpmongodb/website/previous.php">Previous</a>
	  		<a href="http://localhost/phpmongodb/website/suggest.php">Suggest</a>
	  		<a href="http://localhost/phpmongodb/website/premium.php">Premium</a>
	  		<a href="http://localhost/phpmongodb/website/logout.php">Logout</a>
		</div> 

		<div class = "twitter_bot">
			<b>
				<a href="https://twitter.com/avoid_algorithm">What has our twitter bot been reading?</a> 
			</b>
		</div>

	</div>

</body>
</html>