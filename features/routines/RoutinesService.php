<?php
// get all exercises -- legacy, being updated to dynamically render fields
function getAllExercises($pdo) {
    $statement = $pdo->prepare("SELECT * FROM exercises");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC); //  get all rows, as associative arrays
}

// get exercises from array (temp_routines) -- legacy being updated to dynamically render fields

function getTempExercises($pdo,$temp_routine){

      if (empty($temp_routine)) {
        return []; // return empty array instead of running broken SQL
    }

    $placeholders = implode(',', array_fill(0, count($temp_routine), '?'));
    $statement = $pdo->prepare("SELECT * FROM exercises WHERE id in ($placeholders)");
    $statement->execute($temp_routine);
    $exercises = $statement->fetchAll();
    return $exercises;
}

// Get exercises with their dynamically defined fields

function getExercisesWithFields(PDO $pdo): array {

    // SQL joins each exercise with its fields. 
    // Each exercise may appear multiple times — once for each related field.
    // Example result from the JOIN:

    /*
    | exercise_id | name          | field_name | field_type |
    |-------------|---------------|------------|------------|
    | 1           | Barbell Squat | sets       | number     |
    | 1           | Barbell Squat | reps       | number     |
    | 1           | Barbell Squat | weight     | number     |
    | 2           | Push-Up       | sets       | number     |
    */

    $sql = "
        SELECT 
            e.*,
            ef.id AS field_id,
            ef.field_name,
            ef.field_label,
            ef.field_type,
            ef.unit,
            ef.default_value,
            ef.step,
            ef.order_index
        FROM exercises e
        LEFT JOIN exercise_fields ef ON ef.exercise_id = e.id
        ORDER BY e.id, ef.order_index
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $exercises = [];

    // Format the raw result into a nested array (like a view model)
    // so each exercise includes its own list of fields

    foreach ($results as $row) {
        $id = $row['id'];
        
        if (!isset($exercises[$id])) { 
            // If we haven’t seen this exercise yet, create it.
            // Only the first row for each exercise enters this block.
            $exercises[$id] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'category' => $row['category'],
                'default_rest' => $row['default_rest'],
                'is_custom' => $row['is_custom'],
                'muscle_group' => $row['muscle_group'],
                'equipment' => $row['equipment'],
                'type' => $row['type'],
                'default_sets' => $row['default_sets'],
                'default_reps' => $row['default_reps'],
                'default_weight' => $row['default_weight'],
                'default_time_per_set' => $row['default_time_per_set'],
                'fields' => [] // We'll add field data to this array below
            ];
        }

        // If a field exists (LEFT JOIN can return nulls), add it to the fields array
        if ($row['field_id']) {
            $exercises[$id]['fields'][] = [
                'id' => $row['field_id'],
                'field_name' => $row['field_name'],
                'field_label' => $row['field_label'],
                'field_type' => $row['field_type'],
                'unit' => $row['unit'],
                'default_value' => $row['default_value'],
                'step' => $row['step'],
                'order_index' => $row['order_index'],
            ];
        }
    }

    // Reset keys (in case some exercise IDs were not sequential)
    return array_values($exercises);
}



?>