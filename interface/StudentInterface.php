<?php

interface StudentInterface {
    public static function index();
    public static function create();
    public static function show($id);
    public static function update($data);
    public static function delete($id);
}
?>