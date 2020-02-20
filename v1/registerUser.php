<?php
    require_once '../includes/DBOperations.php';
    $response = array();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        if (isset($_POST['username'])
            and isset($_POST['email'])
            and isset($_POST['password'])){
            $db = new DBOperations();
            if($db->createUser($_POST['username'], $_POST['password'], $_POST['email'])){
                $response['error'] = false;
                $response['message'] = "User Created Successfully!!!";
            }else{
                $response['error'] = true;
                $response['message'] = "Something Went Wrong, Please Try Again";
            }

        }else{
            $response['error'] = true;
            $response['message'] = "Required Fields Missing";
        }

    }else{
        $response['error'] = true;
        $response['message'] = "Invalid Response";
    }

    echo json_encode($response);
