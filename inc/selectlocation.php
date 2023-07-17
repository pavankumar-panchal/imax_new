<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
$query = "SELECT slno,locationname FROM ssm_locationmaster ORDER BY locationname";
$result = runmysqlquery($query);
while($fetchresult = mysqli_fetch_array($result))
{
	echo('<option value="'.$fetchresult['slno'].'">'.$fetchresult['locationname'].'</option>');
}				
?>