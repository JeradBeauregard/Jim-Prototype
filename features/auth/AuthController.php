<?php

// Require Database

include('../../includes/db.php');
include('UserService.php');

// session start for automatic login after registration

session_start();

// Check server request type (prevents code from running if page is visited by accident)

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {

// Collect form data from Post Body $_POST is a global php variable used to store post body information

$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirm_password'];

// Server side data Validation for empty inputs

if(empty($first) || empty($last) || empty($email) || empty($password) || empty($confirm)){
    die('Please fill in all fields');
    
}

// check if email is in use- will need to adjust for front end

if (getUser($pdo, $email)) {
    die('Email is already registered');
    
}


// check if passwords match

if ($password !== $confirm) {
    die('Passwords do not match');
   
}

// password hashing before storage, default php bycript hashing

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//insert registration data into database

registerUser($pdo, $first, $last, $email, $hashedPassword);

// Redirect to login page

header("Location: ../../public/login.php");
exit();

}

// login controller

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {

// collect data from form

$email = $_POST['email'];
$password = $_POST['password'];

// server side validation and email sanitization

if(empty($email) || empty($password)){
    die("Please fill in all fields");
    
}

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please enter a valid email address.";
    
}

// Get user from database (from user service);

$userResult = getUser($pdo, $email);

// validate email and password match... set session variables

if($userResult && password_verify($password, $userResult['password'])){

    $_SESSION['user_id'] = $userResult['id'];
    $_SESSION['user_email'] = $userResult['email'];
    header("Location: ../../public/dashboard.php");
    exit();
}
else{
    echo "Invalid email or password.";
}


}

