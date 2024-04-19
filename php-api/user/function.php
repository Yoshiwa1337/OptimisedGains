<?php
    require_once '../inc/conn.php';

    function error422($message){
        $data  = [
            'status' => 422,
            'message' => $message,

        ];
        header("HTTP/1.0 422 Unprocessable Entity");
        echo json_encode($data);
        exit();

    }

    function storeUser($userInput, $userFile, $userSess){

        global $conn;

        $userId = mysqli_real_escape_string($conn, $userSess['userid']);
        $vidName = mysqli_real_escape_string($conn, $userFile['video']['name']);
        $vidExercise = mysqli_real_escape_string($conn, $userInput['exercise']);
        $vidTemp = mysqli_real_escape_string($conn, $userFile['video']['tmp_name']);



        // $name = $_FILES['video']['name'];
        // $temp_name = $_FILES['video']['tmp_name'];
        // $exercise = $_POST['exercise'];
        // $userid = $_SESSION['userid'];

        move_uploaded_file($vidTemp,"vidsuser/".$vidName);

        $video_name = "vidsuser/".$vidName;

        if(empty(trim($userId))){

            return error422('Userid not found');

        }
        else if(empty(trim($vidName))){
            return error422('Video location not found');

        }
        else if(empty(trim($vidExercise))){
            return error422('Video exercise not available');

        }
        else{
            $query = "INSERT INTO `usersvids`(vid_name, vid_exercise, users_id) VALUES('$video_name', '$vidExercise', '$userId')";
            $result = mysqli_query($conn, $query);

            if($result){
                $data  = [
                    'status' => 201,
                    'message' => 'Video Uploaded Successfully',

                ];
                header("HTTP/1.0 201 Created");
                echo json_encode($data);

            }
            else{
                $data  = [
                    'status' => 500,
                    'message' => 'Internal Server Error',

                ];
                header("HTTP/1.0 500 Internal Server Error");
                echo json_encode($data);

            }

        }

    }







    function getUserList(){
        global $conn;

        $query = "SELECT * FROM usersvids";
        $query_run = mysqli_query($conn, $query);
                $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

        foreach ($res as $row) {
            if (array_key_exists("users_id", $row)) {
                echo $row["users_id"];
            } else {
                echo "users_id does not exist in this row";
            }
        }

        if($query_run){

            if(mysqli_num_rows($query_run) > 0){

                $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

                $data  = [
                    'status' => 200,
                    'message' => 'User videos Fetched Successfully',
                    'data' => $res

                ];
                header("HTTP/1.0 200 OK");
                echo json_encode($data);


            }
            else{
                $data  = [
                    'status' => 404,
                    'message' => 'No Customer Found',

                ];
                header("HTTP/1.0 404 No Customer Found");
                echo json_encode($data);

            }

        }
        else{

            $data  = [
                'status' => 500,
                'message' => 'Internal Server Error',

            ];
            header("HTTP/1.0 500 Internal Server Error");
            echo json_encode($data);
        }


        

    }

    function getUser($userParams){

        global $conn;
         
        if($userParams['users_id'] == null){
            return error422('Userid not found');
        }



        $userId = mysqli_real_escape_string($conn, $userParams['users_id']);

        $query = "SELECT * FROM usersvids WHERE users_id='$userId'";
        $result = mysqli_query($conn, $query);

        if($result){

            if(mysqli_num_rows($result) == 1){
                $res = mysqli_fetch_assoc($result);
                $data  = [
                    'status' => 200,
                    'message' => 'Customer Fetched Successfully',
                    'data' => $res

                ];
                header("HTTP/1.0 404 OK");
                echo json_encode($data);


            }
            else{
                $data  = [
                    'status' => 404,
                    'message' => 'User not found',

                ];
                header("HTTP/1.0 404 Not found");
                echo json_encode($data);


            }

        }
        else{
            $data  = [
                'status' => 500,
                'message' => 'Internal Server Error',

            ];
            header("HTTP/1.0 500 Internal Server Error");
            echo json_encode($data);


        }

    }


    // function array_values_to_string($array){
    //     $new_array = array();
    //     foreach($array as $key => $value){
    //         if(is_array($value)){
    //             $new_array[$key] = array_values_to_string($value);
    //         }
    //         else{
    //             $new_array[$key] = (string)$value;
    //         }
    //     }
    //     return $new_array;

    // }





?>