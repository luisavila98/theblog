<?php
class Database
{
    public static function Conection()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=proyecto;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}
