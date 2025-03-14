<?php

namespace Hurycan\Service;

if (file_exists(__DIR__.'\..\..\vendor\autoload.php')) {
    require_once(__DIR__.'\..\..\vendor\autoload.php');
}else{
    require_once(__DIR__.'\..\..\..\..\autoload.php');    
}



use Hurycan\Model\TestModel;


class UserService 
{
    public static function testendpointService($data):array
    {

        return ["err"=>false,"data"=>[]];
    }
}
