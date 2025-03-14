<?php

namespace Hurycan\Service;

try {
    require_once(__DIR__.'\..\..\vendor\autoload.php');
} catch (\Throwable $th) {
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
