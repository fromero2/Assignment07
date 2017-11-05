<?php
	// 1. Create a database connection
	$dbhost = "localhost";
	$dbuser = "widget_corp";
	$dbpass = "coffee";
	$dbname = "widget_corp";

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // if ($connection) { echo 'connected'; } else { echo 'not connected'; }

	// Often these are form values in $_POST
	// $menu_name = "Contact";
	// $position = (int) 5;
	// $visible = (int) 1;

    //HTML form values in post 
    $firstname = trim(stripslashes($_POST['firstname']));
    $lastname = trim(stripslashes($_POST['lastname']));
    $number = trim(stripslashes($_POST['number']));
    $email = trim(stripslashes($_POST['email']));



	
	// Escape all strings
    //$menu_name = mysqli_real_escape_string($connection, $contact);
    $firstname = mysqli_real_escape_string($connection, $firstname);
    $lastname = mysqli_real_escape_string($connection, $lastname);
    $number = mysqli_real_escape_string($connection, $number);
    $email = mysqli_real_escape_string($connection, $email);

	

	// 2. Perform database query
	$query  = "INSERT INTO contacts (";
	$query .= " firstname, lastname, number, email";
	$query .= ") VALUES (";
	$query .= " '{$firstname}', '{$lastname}', '{$number}', '{$email}'";
	$query .= ")";

	$result = mysqli_query($connection, $query);

?>

    <!doctype html>
    <html>

    <head>
        <title>Database Insert - contact form</title>
    </head>

    <body>

        <h1>Database Insert - contact form</h1>

        <?php
	if ($result) {
		echo "Success! - the query didn't error-out";

?>

            <?php

	} else {
		die("Database query failed.");
	}
?>
                <br>
                <a href="contacts-list.php">Continue</a>

    </body>

    </html>





    <?php
	// 5. Close database connection
	mysqli_close($connection);
?>