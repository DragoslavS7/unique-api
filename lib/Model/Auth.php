<?php

class auth {

    protected static $table_name = 'unique_users';

    protected static $fillable = [
        'name','email','password'
    ];


}