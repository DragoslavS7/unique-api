<?php
require_once "lib/outcall.php";
if(validateParams(array ("email"),$_REQUEST)){

    if(!empty($_REQUEST['email'])  ){

        $da = mobileList::allListMobile( $_REQUEST["email"]);
        print_r($da);


    } else {
        echo json_encode(array('result' => '404', 'message' => 'Parameters missing ...'));

    }
} else {
    echo json_encode(array('result' => '404', 'message' => 'Parameters missing ...'));

}