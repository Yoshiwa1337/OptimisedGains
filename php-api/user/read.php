<?php
    //error_reporting(0);
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: GET');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

    require_once 'function.php';
    require_once '../inc/conn.php';

    $requestMethod = $_SERVER['REQUEST_METHOD'];

    if($requestMethod == "GET"){

        // $string_array = array_values_to_string($_GET);

        // foreach($string_array as $video){
        //     if($video["users_id"] === "10"){
        //         echo $video["vid_name"] . "\n";
        //     }
        // }


        if($_GET['users_id']){
            $user = getUser($_GET);
            echo $user;
             //$userList = getUserList();
             //echo $userList;
        }
        else{
            $userList = getUserList();
            echo $userList;
            // $user = getUser($_GET);
            // echo $user;

        }




    }
    else{
        $data  = [
            'status' => 405,
            'message' => $requestMethod. 'Method Not Allowed',

        ];
        header("HTTP/1.0 405 Method Not Allowed");
        echo json_encode($data);
    }





?>
