<?php>
error_reporting(0);
$xml = $_REQUEST['xml'];
if($xml!='false'){
    header('Content-type: text/xml');
    header('Pragma: public');
    header('Cache-control: private');
    header('Expires: -1');
}
//////////My SQL Connection
// Create connection

include "../mysql_connect.php";

$query = "select id,name,icon from tb_category order by id";
$query = mysql_query($query);
$xmldata = '<?xml version="1.0" encoding="utf-8"?><result>';

while ($res = mysql_fetch_object($query))
{
    $xmldata .= '<pagecontent>';    
    $xmldata .= '<id>'.$res->id.'</id>';
    $xmldata .= '<name>'.$res->name.'</name>';
    $xmldata .= '<icon>'.$res->icon.'</icon>';
    $xmldata .= '</pagecontent>' ;
}

mysql_free_result($query);
echo $xmldata .= '</result>';