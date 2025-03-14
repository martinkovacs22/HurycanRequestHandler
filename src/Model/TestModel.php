<?php

namespace Hurycan\Model;

if (file_exists(__DIR__.'\..\..\vendor\autoload.php')) {
    require_once(__DIR__.'\..\..\vendor\autoload.php');
}else{
    require_once(__DIR__.'\..\..\..\..\autoload.php');    
}



use Hurycan\Model\Db;
use Hurycan\Config\Req;
class TestModel{
        public static function CallProcedure($array,$storeProcedure){
            Req::CONFIG_OPTIMALIZATION(); 
            $db = Db::connectToDatabase($_SESSION["db"]["db_name"], $_SESSION["db"]["db_username"], $_SESSION["db"]["db_pass"],$_SESSION["db"]["db_host"]);
        return Db::Call($storeProcedure, $array, $db);
    }
}