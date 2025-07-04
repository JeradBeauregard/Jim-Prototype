<?php

function getAllExercises($pdo) {
    $statement = $pdo->prepare("SELECT * FROM exercises");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC); //  get all rows, as associative arrays
}


?>