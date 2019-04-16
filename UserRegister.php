<?php
require_once "lib/outcall.php";

if(validateParams(array ("name","email","password"),$_REQUEST)){

    if( !empty($_REQUEST['name']) && !empty($_REQUEST['email']) && !empty($_REQUEST['password']) ){

        $da = Authentication::Users($_REQUEST["name"], $_REQUEST["email"], $_REQUEST['password']);
        print_r($da);

    } else {
        echo json_encode(array('result' => '404', 'message' => 'Parameters missing ...'));

    }
} else {
    echo json_encode(array('result' => '404', 'message' => 'Parameters missing ...'));

}