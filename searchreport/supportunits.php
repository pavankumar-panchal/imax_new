<?php 
error_reporting(E_ALL);
ini_set("display_errors",1);

include('../inc/includefiles.php');
$searchcriteria = $_POST['searchcriteria'];
$selection = $_POST['databasefield'];
$orderby = $_POST['orderby'];

switch($orderby)
{
	case 'heading': $orderbyfield = 'heading'; break;
	case 'remarks': $orderbyfield = 'remarks'; break;
}
switch ($selection)
{
	case 'heading': $textfield = "heading LIKE '%".$searchcriteria."%'"; break;
	case 'remarks': $textfield = "remarks LIKE '%".$searchcriteria."%'"; break;
}
$grid = '<table  border="1" bordercolor = "#FFFFFF" cellspacing="0" cellpadding="0">
<tr bgcolor="#F79646"><td><font color="#FFFFFF">Sl No</font></td><td><font color="#FFFFFF">Category Heading</font></td><td><font color="#FFFFFF">Remarks</font></td></tr>';

$query = "SELECT * FROM ssm_supportunits WHERE ".$textfield." ORDER BY ".$orderbyfield;
$result = runmysqlquery($query);
$i_n = 0;
while($fetch = mysqli_fetch_row($result))
{
	$i_n++;
	$color;
	if($i_n%2 == 0)
	$color = "#edf4ff";
else
	$color = "#f7faff";
	$grid .= '<tr nowrap="nowrap" bgcolor='.$color.'>';
	for($i = 0; $i < count($fetch); $i++)
	{
		$grid .= "<td><font color='#000000'>".$fetch[$i]."</font></td>";
	}
	$grid .= '</tr>';
}
$grid .= '</table>';

		$localdate = datetimelocal('Ymd');
		$localtime = datetimelocal('His');
		$filebasename = "S_SU".$localdate."-".$localtime.".xls";
		$filepath = $_SERVER['DOCUMENT_ROOT'].'/support/uploads/'.$filebasename;
		$downloadlink = 'http://'.$_SERVER['HTTP_HOST'].'/support/uploads/'.$filebasename;
		
		$fp = fopen($filepath,"wa+");
		if($fp)
		{
			fwrite($fp,$grid);
			downloadfile($filepath);
			fclose($fp);
		} 
?>
