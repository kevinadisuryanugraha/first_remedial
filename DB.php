<?php
    
    class DB{
        private static $hostname = "localhost";
        private static $username = "root";
        private static $password = "";
        private static $database = "remedial_crud";

        public static $koneksi;

        public static function connect()
        {
            self::$koneksi = mysqli_connect(self::$hostname, self::$username, self::$password, self::$database);

            if(self::$koneksi->connect_error){
                // die("koneksi bermasalah");
            }
            // echo "koneksi berhasil"
            return self::$koneksi;
        }

        public static function query($sql)
        {
            $connection = self::connect();
            return $connection->query($sql);
        }
}

?>