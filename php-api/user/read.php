<?php
    // error_reporting(0);
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: GET');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

    require_once 'function.php';

    $requestMethod = $_SERVER['REQUEST_METHOD'];

    if($requestMethod == "GET"){

        if($_GET['users_id']){
            // $user = getUser();
            // echo $user;
            $userList = getUserList();
            echo $userList;
        }
        else{
            // $userList = getUserList();
            // echo $userList;
            $user = getUser($_GET['users_id']);
            echo $user;

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