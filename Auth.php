<?php

session_start();

include_once("./DB.php");
include_once("./User.php");

Class Auth {
    public static function register ($data){
        $username = $data["username"];
        $password = password_hash($data["password"], PASSWORD_DEFAULT);

        if($username !== "" || $password !== ""){
            User::set_username($username);
            User::set_password($password);
            return User::create();
            
        }
    }

    public static function login ($username, $password){

        if($username !=="" || $password !== ""){
            $user = User::getByUsername($username);
            if(password_verify($password, $user["password"])){
                $_SESSION["username"] = $username;
                return true;
            }
            return false; 
        }
        return false;

    }

    public static function logout(){

        session_destroy();

        return true;
    }
}
?>