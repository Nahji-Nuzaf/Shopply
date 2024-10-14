<?php

    class Shopply{

        public static $connection;

        public static function setConnection(){
            if(!isset(Shopply::$connection)){
                Shopply::$connection = new mysqli("localhost","root","#password#","shopplyown","3306");
            }
        }

        public static function iud($q){
            Shopply::setConnection();
            Shopply::$connection->query($q);
        }

        public static function search($q){
            Shopply::setConnection();
            $resulset = Shopply::$connection->query($q);
            return $resulset;
        }

    }
    
?>