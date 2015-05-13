
<?php

/*YO... I changed 'email' to 'email' throughout. */

session_start(); // Starting Session
include("db.php");

if (isset($_POST['submit'])) {

    // if (empty($_POST['email']) || empty($_POST['password'])) {
    //   $error = "email or Password is invalid";
    // } else {
    print("Your provided email is $_POST[email] and password is $_POST[password]");
    // Define $email and $password
	
    $email=$_POST['email']; 
    $password=$_POST['password'];

    // Establishing Connection with Server by passing server_name, user_id and password as a parameter
    $connection = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database);

    // Selecting Database
    $db = mysqli_select_db($connection, $mysql_database);

    // SQL query to fetch information of registered users and finds user match.
    $query = mysqli_query($connection, "select * from login where password='$password' AND email='$email'");
    $rows = mysqli_num_rows($query);

    if ($rows == 1) {
        $_SESSION['login_user']=$email; // Initializing Session
        header("location: profile.php"); // Redirecting To Other Page
        die;
    } else {
        print "<br>email or Password is invalid";
    }

    mysqli_close($connection); // Closing Connection

    // }

} else {
    echo 'there is no $_POST[Submit]';
    die;
}
?>