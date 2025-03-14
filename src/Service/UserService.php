<?php

namespace Hurycan\Service;

require_once(__DIR__.'\..\..\vendor\autoload.php');


use Hurycan\Model\TestModel;


class UserService 
{
    public static function testendpointService($data):array
    {

        return ["err"=>false,"data"=>[]];
    }
}
