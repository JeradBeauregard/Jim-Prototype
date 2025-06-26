
<?php

// Register User (create new user)

function registerUser($pdo, $first, $last, $email, $password){

   $statement = $pdo->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
   $statement->execute([$first, $last, $email, $password]);

}