<?php

namespace Hurycan\Config;

if (file_exists(__DIR__.'\..\..\vendor\autoload.php')) {
    require_once(__DIR__.'\..\..\vendor\autoload.php');
}else{
    require_once(__DIR__.'\..\..\..\..\autoload.php');    
}


use Hurycan\Config\Res;
use Hurycan\Config\HttpStatus;

class ExceptionHandler
{
    public static function msg($returnValue, $http = null)
    {
        $res = new Res();
        $res->setBody($returnValue);
        $res->setStatus_code($http==null?HttpStatus::BAD_REQUEST:$http);
        $res->send();
        exit();
    }
}
