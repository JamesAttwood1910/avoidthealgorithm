<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
  <style type="text/css">
    
    body {
        background-color: #1A4D2E;
        font-family: Lucida Console;
        color: #FAF3E3;
        margin-left: min(10%, 400px);
        margin-right: min(50px,50%);
    }

    h1 {
        background-color: #FAF3E3;
        padding: 5px 10px;
        position: center;
        margin-top: 50px;
        color: #000000;
        max-width: min(400px, 50%);

    }

    h3 {
      padding-left: 3px;
      padding-top: 2px;
      padding-bottom: 2px;
      border-style: outset;
      border-color: #FAF3E3;
    }

    button {
        font-family: Lucida Console;
        color: #000000;
        padding: 5px;
        border-style: outset;
        border-color: #FAF3E3;
        background-color: #FF9F29;
        margin-bottom: 20px;
    }

    button:hover {
        background-color: #FAF3E3;
        color: #000000;
    }

    input {
        font-family: Lucida Console;
        color: #000000;
        width: 200px;
    }




  </style>
</head>
<body>

	<h1>Register to Avoid the Algorithm</h1>

	<h3>Avoid the Algorithm is your daily source of insightful and interesting information. Register now to receive an article each day. Avoid the swamp of information and make sure you read at least one informative piece of information each day. It is good for the mind.</h3>

	<form action = "user_subscriptions_backend.php" method = "post">
		<b>Please enter your details below.</b><br>
		<br>
		<label>First name:</label>
		<input type="text" name="first_name", id = "first_name" required><br>
		
		<br>

		<label>Second name:</label>
		<input type="text" name="second_name", id = "second_name" required><br>
		
		<br>
		<label>Email:</label>
		<input type="text" name="email", id = "email" required><br>

		<br>
    <label>Password:</label>
    <input type="text" name="password", id="password" required><br>

    <br>
    <label>Confirm password: </label>
    <input type="text" name="confirm_password", id="confirm_password" required><br>
    
    <br>  
		<label>Sex:</label>
		<input list="sex", name="sex">
		<datalist id = "sex">
			<option value="Male">
			<option value="Female">
			<option value="Other">
			<option value="Prefer not to say">
		</datalist>
		<br>

		<br>
		<label>Age:</label>
		<input list="age", name="age">
  		<datalist id="age">
    	<option value="<10">
    	<option value="10-18">
    	<option value="19-26">
    	<option value="27-35">
    	<option value="36-45">
    	<option value="46-60">
    	<option value="60-75">
    	<option value=">75">
  		</datalist>
  		<br>

		<br>
  		<label>Country: </label>
  		<input type="text" name="country", id = "country">
  		<br>

  		<br>
  		<label>Region: </label>
  		<input type="text" name="region", id=""region>
  		<br>

  		<br>
  		<label>Highest education level completed:</label>
  		<input list="education", name = "education">
  		<datalist id="education">
    	<option value="Primary School">
    	<option value="Secondary School">
    	<option value="Sixth Form / Colleage">
    	<option value="University">
    	<option value="Post Graduate Diploma">
    	<option value="Masters">
    	<option value="Phd">
  		</datalist>
  		<br>

  		<br>
  		<label>Which of the following topics interest you? </label>
  		<br>
  		<br>
  		<label>Topic 1</label>
  		<input list="topic1", name = "topic1">
  		<datalist id="topic1">
    	<option value="entertainment">
    	<option value="science">
    	<option value="technology">
    	<option value="disability">
    	<option value="business">
    	<option value="arts">
    	<option value="health">
    	<option value="sport">
  		</datalist>
  		<br>
  		<br>
  		<label>Topic 2</label>
  		<input list="topic2", name="topic2">
  		<datalist id="topic2">
    	<option value="entertainment">
    	<option value="science">
    	<option value="technology">
    	<option value="disability">
    	<option value="business">
    	<option value="arts">
    	<option value="health">
    	<option value="sport">
  		</datalist>
  		<br>
  		<br>
  		<label>Topic 3</label>
  		<input list="topic3", name="topic3">
  		<datalist id="topic3">
    	<option value="entertainment">
    	<option value="science">
    	<option value="technology">
    	<option value="disability">
    	<option value="business">
    	<option value="arts">
    	<option value="health">
    	<option value="sport">
  		</datalist>
  		<br>
  		<br>




  		<button type="submit">Sign up</button>

	</form>

</body>
</html>