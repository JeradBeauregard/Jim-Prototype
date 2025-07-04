
<?php

// Register User (create new user)

function registerUser($pdo, $first, $last, $email, $password){

   $statement = $pdo->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
   $statement->execute([$first, $last, $email, $password]);

}

// get user

function getUser($pdo, $email) {

    $statement = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $statement->execute([$email]);
    $user = $statement->fetch(PDO::FETCH_ASSOC); // fetch assoc array of user 
    return $user;
}

?>