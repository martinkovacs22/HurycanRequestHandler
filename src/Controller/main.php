<?php
namespace Hurycan\Controller;
session_start();
// header("Access-Control-Allow-Origin:*");
// header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Requested-With,token");
// header("Access-Control-Max-Age:86400");
// header("Access-Control-Allow-Credentials:true");
// header("Content-Type:application/json");
// header("Access-Control-Allow-Methods:POST,OPTIONS");
if (file_exists(__DIR__.'\..\..\vendor\autoload.php')) {
    require_once(__DIR__.'\..\..\vendor\autoload.php');
}else{
    require_once(__DIR__.'\..\..\..\..\autoload.php');    
}

use Hurycan\Config\Req;
use Hurycan\Controller\UserController;

use Hurycan\Config\ExceptionHandler;

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}



Req::CONFIG_OPTIMALIZATION();
  $logFile = __DIR__ . '\..\..\change_log.txt';

    $headerCode_Res;

if (Req::getReqMethod() === "POST") {
  

    if (method_exists(UserController::class, Req::getReqFun())) {
        UserController::{Req::getReqFun()}();
        $headerCode_Res =  UserController::$res->getStatus_code();
    } else {
        ExceptionHandler::msg(array("err" => true, "data" => "Bad Requiest not found Fun." , "fun"=>Req::getReqFun()));
    }
    if (!file_exists($logFile)) {
        touch($logFile);
        chmod($logFile, 0666);
    }
    // print_r($headerCode_Res);
    if (!empty(Req::getReqBody())) {
        $body = Req::getReqBody();

        $body["password"] = isset($body["password"])? hash("sha256", $body["password"]):false;
        $data = date('Y-m-d H:i:s') . " - " . json_encode($body) ."/ip : ".Req::getIP(). " / route : ". Req::getReqFun(). " / Status : {$headerCode_Res}" . "\n";
        file_put_contents($logFile, $data, FILE_APPEND | LOCK_EX);
        // echo"fds";
    }
} else {
    $logFile = __DIR__ . '\..\..\change_log.txt';

    $headerCode_Res = 404;
    if (!file_exists($logFile)) {
        touch($logFile);
        chmod($logFile, 0666);
    }
    // print_r($headerCode_Res);
        $body = Req::getReqBody();

        $body["password"] = isset($body["password"])? hash("sha256", $body["password"]):false;
        $data = date('Y-m-d H:i:s') . " - " . json_encode($body) ."/ip : ".Req::getIP(). " / route : ". Req::getReqFun(). " / Status : {$headerCode_Res}" . "\n";
        file_put_contents($logFile, $data, FILE_APPEND | LOCK_EX);
        // echo"fds";
    ExceptionHandler::msg(array("err" => true, "data" => Req::getReqMethod() . " not found."));
}
// echo json_encode(array("err"=>false));