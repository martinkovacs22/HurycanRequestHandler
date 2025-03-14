<?php

namespace Hurycan\Controller;
try {
    require_once(__DIR__.'\..\..\vendor\autoload.php');
} catch (\Throwable $th) {
    require_once(__DIR__.'\..\..\..\..\autoload.php');
}




use Hurycan\Config\Req;
use Hurycan\Config\Res;
use Hurycan\Config\HttpStatus;
use Hurycan\Service\UserService;
use Hurycan\Config\Base64;
/*Login #DONE, Reg #DONE, JWTValidate #DONE, Follow #TODO, Profile update #DONE, Messages #TODO, Post Notifications #TODO, Likes #TODO*/

class TestController{

static public Res $res;

static function testendpoint(){
    self::$res = new Res();
    $serviceData = UserService::testendpointService(Req::getReqBody());
    self::$res->setBody($serviceData);
    $serviceData["err"] ? self::$res->setStatus_code(HttpStatus::INTERNAL_SERVER_ERROR) : self::$res->setStatus_code(HttpStatus::OK);
    self::$res->send();

}


}
