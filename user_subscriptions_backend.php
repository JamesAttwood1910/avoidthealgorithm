<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 

	require_once __DIR__ . '/vendor/autoload.php';

	require_once __DIR__ . '/vendor/autoload.php';

	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

	$dotenv->load();

	require("functions/functions.php");

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	$collection = connect_mongodb()->news_db->users;

	$date = date_create();

	$first_name = isset($_POST["first_name"] ) ? $_POST["first_name"]: '';

	$second_name = isset($_POST["second_name"] ) ? $_POST["second_name"]: '';

	$email = isset($_POST["email"] ) ? $_POST["email"]: '';

	$password_set = isset($_POST["password"] ) ? $_POST["password"]: '';

	$confirm_password_set = isset($_POST["confirm_password"] ) ? $_POST["confirm_password"]: '';

	$sex = isset($_POST["sex"] ) ? $_POST["sex"]: '';

	$age = isset($_POST["age"] ) ? $_POST["age"]: '';

	$country = isset($_POST["country"] ) ? $_POST["country"]: '';

	$region = isset($_POST["region"] ) ? $_POST["region"]: '';

	$education = isset($_POST["education"] ) ? $_POST["education"]: '';

	$topic1 = isset($_POST["topic1"] ) ? $_POST["topic1"]: '';

	$topic2 = isset($_POST["topic2"] ) ? $_POST["topic2"]: '';

	$topic3 = isset($_POST["topic3"] ) ? $_POST["topic3"]: '';


	####################################################

	# Password validation

	if(empty(trim($password_set))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($password_set)) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($password_set);
    }

    if(empty(trim($confirm_password_set))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($confirm_password_set);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    if(empty($password_err) && empty($confirm_password_err)){

    
        $param_password = password_hash($password, PASSWORD_DEFAULT);

		$insertOneResult = $collection->insertOne([

		'Timestamp' => $date->getTimestamp(),
		'First_name' => $first_name,
		'Second_name' => $second_name,
		'email' => $email,
		'password' => $param_password,
		'Sex' => $sex,
		'Age' =>  $age,
		'Country' => $country,
		'Region' => $region,
		'Education' => $education,
		'Topic_1' => $topic1,
		'Topic_2' => $topic2,
		'Topic_3' => $topic3,

		]);

		$receiver = $email;
		$subject = "Registration successful - avoidthealgorithm";
		$body = "Hi ${first_name} ${second_name}, thank you for registering with avoidthealgorithm your daily source of unalgorithmed news. Keep your mind fresh by reading one artilce a day. Your account details are - password: ${password_set} - username: ${email}. Remember you can log into your account to give your reaction to each article you read." ;
		$sender = "From:avoidthealgorithm@gmail.com";
		if(mail($receiver, $subject, $body, $sender)){
    		
    		header("location: thanks_for_registering.php");

		}else{
    		echo "Please try registering again, your passwords did not match.";

			header("location: user_subscription.php");
		}

	} else {

		echo "Please try registering again, your passwords did not match.";

		header("location: user_subscription.php");

	}


# C:\Users\james\AppData\Roaming\Microsoft\Windows\Start Menu\Programs\Anaconda3 (64-bit)
# Anaconda Powershell Prompt (anaconda3)
	?>

</body>
</html>