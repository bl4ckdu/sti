<?php
/**
 * Created by PhpStorm.
 * User: leduardo
 * Date: 24/01/2019
 * Time: 14:23
 */

class Connect
{
    public function connect_db(){
        try {
            if(!isset($cn)) {
                $cn = new PDO('mysql:host=localhost; dbname=sti_interno','luiz.eduardo','1nF0@3dU@rD0');
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $cn;
    }    
}