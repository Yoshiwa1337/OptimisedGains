<?php
    $existingExercises = array("Bench Press", "Squat", "Deadlift", "ATG split squat");

    if (isset($_POST['suggestion'])){
        $search = $_POST['suggestion'];

        if (!empty($search)){
            foreach ($existingExercises as $existingExercise){
                if (strpos($existingExercise, $search) !== false){
                    echo $existingExercise;
                    echo "<br>";

                }

            }


        }

    }



?>