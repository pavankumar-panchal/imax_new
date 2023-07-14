<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include('./functions/phpfunctions.php');
include('./inc/checktype.php');

// $usertype = $usertype;
$logintype = "OUT";
$date = datetimelocal('Y-m-d');
$time = datetimelocal('H:i:s');
$user = imaxgetcookie('ssmuserid');

echo $usertype;

// $query = "INSERT INTO ssm_usertime (userid, logindate, logintime, logintype, type, locationname) 
//           VALUES ('".$user."', '".$date."', '".$time."', '".$logintype."', '".$usertype."', 'default_location')";

// $query = "INSERT INTO ssm_usertime (userid, logindate, logintime, logintype, type, remarks) 
// VALUES ('".$user."', '".$date."', '".$time."', '".$logintype."', '".$usertype."')";
// $result = runmysqlquery($query);

// $query = "INSERT INTO ssm_usertime(userid,logindate,logintime,logintype,type) values('" . $user . "','" . $date . "','" . $time . "',
// 	'" . $logintype . "','" . $usertype . "')";
// $result = runmysqlquery($query);

session_destroy();
imaxdeletecookie('ssmuserid');
header('Location:../imax_new/index.php');
?>