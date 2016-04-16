<?php

include_once './db_functions.php';
//Create Object for DB_Functions Class

$db = new DB_Functions();
$greetid = $_POST["greetId"];
$regId = $_POST["regId"];
$res = $db->insertUser($greetid, $regId);

?>