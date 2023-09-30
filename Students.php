<?php
include_once("./abstract/StudentAbstract.php");
include_once("./interface/StudentInterface.php");
include_once("./trait/DeveloperTrait.php");
include_once('./DB.php');

class Student extends StudentAbstract implements StudentInterface {
    use developer;

    public static function set_name(String $name){
        self::$name = $name;
    }
    
    public static function set_nis(int $nis){
        self::$nis = $nis;
    }

    public static function set_phone(int $phone){
        self::$phone = $phone;
    }
    
    public static function get_name(){
        return self::$name;
    }
    
    public static function get_nis(){
        return self::$nis ;
    }

    public static function get_phone(){
        return self::$phone ;
    }

    public static function index(){
        $result = DB::query("SELECT * FROM students")->fetch_all(MYSQLI_ASSOC); 
        return $result;
    }
    
    public static function create(){
        $name = self::$name;
        $nis = self::$nis;
        $phone = self::$phone;
        $result = DB::query("INSERT INTO students (name, nis, phone) VALUES ('$name', '$nis', '$phone')");
        if($result) {
            return "Berhasil menambah data";
        }
        else {
            return "Gagal";
        }
    }
    
    public static function show($id){
        $result = DB::query("SELECT * FROM students WHERE id= '$id'")->fetch_assoc(); 
        return $result;
    }
    
    
    public static function update($data) {
        $id = $data['id'];
        $name = $data['name'];
        $nis = $data['nis'];
        $phone = $data['phone'];
        $sql = "UPDATE students SET name='$name', nis='$nis', phone='$phone' WHERE id='$id'";
        $result = DB::connect()->query($sql);
    
        if ($result) {
            return "Berhasil mengedit data";
        } else {
            return "Gagal Update";
        }
    }
    

    public static function delete($id){
        $result = DB::query("DELETE FROM students WHERE id='$id'");
        if($result) {
            return "Berhasil menghapus data";
        }
        else {
            return "Gagal";
        }    
    }
}

?>