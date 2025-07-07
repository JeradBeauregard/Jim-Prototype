
<?php
session_start();

include(__DIR__ . '/../../includes/db.php');                
include(__DIR__ . '/RoutinesService.php');     

// get all exercises

$exercises = getAllExercises($pdo);



// add exercise to temp routine logic

if(!isset($_SESSION['temp_routine'])){
    $_SESSION['temp_routine'] = []; // if temp routine isnt set create new array  

}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_exercise'])){

    $exercise_id = $_POST['exercise_id'];
 //prevent duplicate exercises in routine -- may consider changing this later if user wants exercise multiple times in routine
    if(!in_array($exercise_id,$_SESSION['temp_routine'])){
        $_SESSION['temp_routine'][] = $exercise_id; // adds exercise to session array
    }
    header("Location: /Jim-Prototype/public/routinebuilder.php"); // return to routine builder page
    exit;

}

$temp_routine = $_SESSION['temp_routine'];
$temp_exercises = getTempExercises($pdo, $temp_routine);

include(__DIR__ . '/routine_builder.php');

?>