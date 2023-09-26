<?php

abstract class UserAbstract {
    public static $username;
    protected static $password;
    
    abstract public static function set_username(String $username);
    abstract public static function set_password(String $passsword);
    abstract public static function get_username();
    abstract public static function get_password();
}

?>
