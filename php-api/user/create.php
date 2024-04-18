<?php
    error_reporting(0);



    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: POST');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

    require_once 'function.php';

    $requestMethod = $_SERVER['REQUEST_METHOD'];

    if($requestMethod == 'POST'){

        $inputData = json_decode(file_get_contents("php://input"), true);   //If using ajax or any method to store data without the form, at that time use this.
        echo $inputData;
        if(empty($inputData)){
            // echo $_POST['name'];
            $storeUser = storeUser($_POST, $_FILES, $_SESSION);
        }
        else{
            // echo $inputData['name'];
            $storeUser = storeUser($inputData);
        }
        echo $storeUser;

    }
    else{
        $data  = [
            'status' => 405,
            'message' => $requestMethod. ' Method Not Allowed',

        ];
        header("HTTP/1.0 405 Method Not Allowed");
        echo json_encode($data);

    }



?>