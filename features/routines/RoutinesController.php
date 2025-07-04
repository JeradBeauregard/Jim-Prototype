
<?php
include(__DIR__ . '/../../includes/db.php');                // ✅ db is in /includes
include(__DIR__ . '/RoutinesService.php');                  // ✅ service is in same folder

$exercises = getAllExercises($pdo);

include(__DIR__ . '/routine_builder.php');
