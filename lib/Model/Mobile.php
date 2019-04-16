<?php

class Mobile {

    protected static $table_name = 'unique_table';

    protected static $table_name_user = 'unique_users';

    protected static $fillable = [
        'email','imei', 'brand', 'model', 'price', 'status','in_total'
    ];


}