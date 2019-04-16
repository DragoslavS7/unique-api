<?php
require_once "lib/outcall.php";
if(validateParams(array ("email"),$_REQUEST)){

    if(!empty($_REQUEST['email']) && !empty($_REQUEST['in_total']) && !empty($_REQUEST['brand']) && !empty($_REQUEST['model']) ){

        $da = mobileList::buyMobile( $_REQUEST["email"],$_REQUEST["in_total"],$_REQUEST["brand"],$_REQUEST["model"]);
        print_r($da);

    } else {
        echo json_encode(array('result' => '404', 'message' => 'Parameters missing ...'));

    }
} else {
    echo json_encode(array('result' => '404', 'message' => 'Parameters missing ...'));

}