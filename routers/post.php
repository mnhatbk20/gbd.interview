<?php
if(!defined('APP_ROOT')) {echo "access not allowed";  exit; }

if ($path == "/add-user"){
    runController("add-user-postmethod");
}