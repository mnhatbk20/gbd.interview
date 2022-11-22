<?php 

define('APP_ROOT', true);

const GET = "GET";
const POST = "POST";
const PUSH = "PUSH";

function getMethod(){
    return $_SERVER["REQUEST_METHOD"];
}

function getPath(){
    $path = $_SERVER['REQUEST_URI'];
    $position = strpos($path, '?');
    if ($position !== false) {
        $path = substr($path, 0, $position);
    }       
    str_ends_with($path,"/")?$path:($path."/");
    return $path;
}

function runController($nameController){
    $ROOTPATH = __DIR__;
    $pathController = $ROOTPATH."\\controllers\\".$nameController.".php";
    require_once($pathController);
    die();
}

function showView($nameView,$dataView=null){
    $ROOTPATH = __DIR__;
    $data = $dataView;
    $pathView = $ROOTPATH."\\views\\".$nameView.".php";
    require_once($pathView);
}

function responseJson($data){
    ob_clean();
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    die();
}


function runApp(){

    $method = getMethod();
    $path = getPath();  

    if ($method == GET){    
        require_once("routers/get.php");        
    }
    if ($method == POST){
        require_once("routers/post.php");   
    }
};

runApp();