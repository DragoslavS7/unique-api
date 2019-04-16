<?php

class mobileList extends Mobile{

    public static function createMobil($imei,$brand,$model,$price,$status){
        global $db;
        if( isset($imei) && !empty($imei) && isset($brand) && !empty($brand) && isset($model) && !empty($model) &&
            isset($price) && !empty($price) && isset($status) && !empty($status)) {

            //Todo

        }
    }

    public static function allListMobile($email){
        global $db;
        if( isset($email) && !empty($email)){

            $list = $db->select("SELECT ".static::$fillable[0] ." FROM ".static::$table_name_user ." WHERE ".static::$fillable[0] ." = '". $email ."' ");

            if($list){

                $mobile = $db->select("SELECT * FROM " . static::$table_name );

                $db->close_connection();

                return json_encode(array('mobile-list' => $mobile),JSON_PRETTY_PRINT);

            }
            $db->close_connection();
            return json_encode(array('result' => false, 'message' => 'Email does not exists'));

        } else {

            return json_encode(array('result' => '404', 'message' => 'There was an error in entering email and tokens'));

        }
    }

    public static function activateMobile(){
        global $db;

            $buy = $db->select("SELECT * FROM " . static::$table_name ." WHERE ".static::$fillable[5] ." = '". 1 ."' " );

            if($buy){
                return json_encode(array('activate-mobile' => $buy),JSON_PRETTY_PRINT);

            }
            return json_encode(array('result' => false, 'message' => 'System of error'));

    }

    public static function buyMobile($email,$in_total,$brand,$model)
    {
        global $db;
        if (isset($email) && !empty($email) && isset($in_total) && !empty($in_total)  && isset($brand) && !empty($model)  && isset($brand) && !empty($model)) {

            $queryEmail = $db->select("SELECT " . static::$fillable[0] . " FROM " . static::$table_name_user . " WHERE " . static::$fillable[0] . " = '" . $email . "' ");

            if ($queryEmail[0][0] == $email) {

                /** select all where is status == 1 or true **/

                $buy = $db->select("SELECT * FROM " . static::$table_name ." WHERE ".static::$fillable[5] ." = '". 1 ."' " );

                if($buy[0][2] == $brand && $buy[0][3] == $model){
                   $db->update("UPDATE unique_table SET brand=?,model=?,in_total=? WHERE id = 2",[$brand,$model,$buy[0][6] - $in_total],'iss');

                } else {
                    return json_encode(array('result' => false, 'message' => 'Select the phone you want'));

                }

                return json_encode(array('buy-mobile' => $buy), JSON_PRETTY_PRINT);

            }
            return json_encode(array('result' => false, 'message' => 'System of error'));

        } else {

            return json_encode(array('result' => '404', 'message' => 'There was an error in entering email and tokens'));

        }
    }

}