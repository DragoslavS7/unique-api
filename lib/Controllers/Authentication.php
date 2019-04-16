<?php

class Authentication extends auth {

    public static function Users($name, $email, $password){
        global $db;
        $password = md5($password);

        if( isset($name) && !empty($name) && isset($email) && !empty($email) && isset($password) && !empty($password) ){
            if(self::isValidEmail($email) == true){

                $users = $db->create("INSERT INTO ".static::$table_name."(".static::$fillable[0].", ".static::$fillable[1].", ".static::$fillable[2].") VALUES (?,?,?)", [$name,$email,$password], 'sss');

                if($users){

                    return json_encode(array('result' => true));

                }

                $db->close_connection();

                return json_encode(array('result' => false, 'message' => 'The email must be unique'));

            } else {

                return json_encode(array('result' => false, 'message' => 'Email is not a valid'));

            }

        } else {

            return json_encode(array('result' => '404', 'message' => 'Please fill in all fields'));

        }
    }

    public static function isValidEmail($email){
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

        if (preg_match($regex, $email)) {
            return true;
        } else {
            return false;
        }

    }

    public static function Login($email,$password){
        global $db;
        if( isset($email) && !empty($email) && isset($password) && !empty($password) ){
            if(self::isValidEmail($email) == true){

                $users = $db->select("SELECT * FROM ".static::$table_name." WHERE ". static::$fillable[1] ."='" . $email . "' AND ". static::$fillable[2] ."='" . md5($password) . "'");

                if($users){

                    return json_encode(array('result' => true, 'email' => $users['email'] , 'tokens' => $users['session_tokens']));

                }

                $db->close_connection();

                return json_encode(array('result' => false, 'message' => 'Parameters is not a valid'));
            } else {

                return json_encode(array('result' => false, 'message' => 'Email is not a valid'));

            }
        } else {

            return json_encode(array('result' => '404', 'message' => 'There was an error in entering email and passwords'));

        }
    }
}