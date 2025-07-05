<?php
// get all exercises
function getAllExercises($pdo) {
    $statement = $pdo->prepare("SELECT * FROM exercises");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC); //  get all rows, as associative arrays
}

// get exercises from array (temp_routines)

function getTempExercises($pdo,$temp_routine){

    $placeholders = implode(',', array_fill(0, count($temp_routine), '?'));
    $statement = $pdo->prepare("SELECT * FROM exercises WHERE id in ($placeholders)");
    $statement->execute($temp_routine);
    $exercises = $statement->fetchAll();
    return $exercises;
}

?>