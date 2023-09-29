<?php

abstract class StudentAbstract {
    public static $name;
    public static $nis;
    public static $phone;

    abstract public static function set_name(String $name);
    abstract public static function set_nis(Int $nis);
    abstract public static function set_phone(Int $phone);
    abstract public static function get_name();
    abstract public static function get_nis();
    abstract public static function get_phone();

}
?>