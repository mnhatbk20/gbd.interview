<?php
if(!defined('APP_ROOT')) {echo "access not allowed";  exit; }


if ($path == "/"){
    showView("home");
    die();
}
if ($path == "/views/ds"){
    showView("home");
    die();
}
if ($path == "/list"){
    runController("list");
}
if ($path == "/get-user"){
    runController("get-user");
}
if ($path == "/delete-user"){
    runController("delete-user");
}
if ($path == "/add-user"){
    runController("add-user-getmethod");
}

showView("404");
die();