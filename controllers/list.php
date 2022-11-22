<?php
  require_once("database/mysql.php");
  require_once("models/users.php"); 

  $users = getAllUser($connection);

  showView("list",["users" => $users]);


