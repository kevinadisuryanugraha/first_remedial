<?php
include_once("./abstract/UserAbstract.php");
include_once("./interface/UserInterface.php");
include_once("./trait/DeveloperTrait.php");
include_once("./DB.php");

class User extends UserAbstract implements UserInterface {
    use developer;

    public static function set_username(String $username){
        self::$username = $username;
    }
    
    public static function set_password(String $password){
        self::$password = $password;
    }
    
    public static function get_username(){
        return self::$username;
    }
    
    public static function get_password(){
        return self::$password ;
    }
    
    public static function index(){
        $result = DB::query("SELECT * FROM users")->fetch_all(MYSQLI_ASSOC); 
        return $result;
    }
    
    public static function create(){
        $username = self::$username;
        $password = self::$password;
        $result = DB::query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
        return $result;
    }
    
    public static function show($id){
        $result = DB::query("SELECT*FROM users WHERE id= '$id'")->fetch_assoc(); 
        return $result;
    }
    
    public static function update($id){
        $username = self::$username;
        $password = self::$password;

        $sql = "UPDATE students SET username='$username', password='$password' WHERE id='$id'";
        $result = DB::connect()->query($sql);

        if($result){
            return "berhasil update";
        }else{
            return "gagal update";
        }
    }
    public static function delete($id){
        $result = DB::query("DELETE FROM users WHERE id='$id'"); 
       
    }

    public static function getByUsername($username){
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result =  DB::connect()->query($sql);
        $data = $result->fetch_assoc();
        return $data;
    }
}


?>
