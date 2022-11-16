<!DOCTYPE html>

<html>

<head>

    <title>Password Reset</title>

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
            color:white;
        }
        
        .boundary {

            padding-top: 5%;
            padding-bottom: 5%;
            padding-left: 20%;
            padding-right: 20%;

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




    </style>

</head>

<body>

    <div class = "boundary">

       <div class = title>
            <h1> Avoid the Algorithm </h1>
        </div>

        <h3>The reset code you have entered is incorrect. Please select one of the below options.</h3>

        <div class = "bottombuttons">

                <a href="../../login_page.php">Login</a>
                
                <a href="../../user_subscription.php">Sign up now</a>                

                <a href="password_reset.php">Reset password</a>
        </div>

     </div>

</body>

</html>