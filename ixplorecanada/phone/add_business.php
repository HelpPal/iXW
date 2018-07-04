<?php
error_reporting(0);
$xml = $_REQUEST['xml'];
if($xml!='false'){
    header('Content-type: text/xml');
    header('Pragma: public');
    header('Cache-control: private');
    header('Expires: -1');
}

include "../mysql_connect.php";

$name          = $_POST['name'] ;
$lat          = $_POST['lat'] ;
$lng          = $_POST['lng'] ;
$email          = $_POST['email'] ;
$phone_num          = $_POST['phone_number'] ;

$query = "INSERT INTO tb_business(name, email, phone_num) values ('".$name."','".$email."','".$phone_num."')";

if (mysql_query($query,$conn) )
{
    $msg = "1";
}
else
    $msg = "Can't store your business ".mysql_error() ;

$query = "select * from tb_business where name='".$name."' and email='".$email."' and phone_num='".$phone_num."'" ;
$query = mysql_query($query, $conn);
$client_id = 0 ;

while ($res = mysql_fetch_object($query))
{
    $client_id = $res->id ;
}

$query = "INSERT INTO tb_position(client_id,latitude,longitude) values ('".$client_id."','".$lat."','".$lng."')";
if (mysql_query($query,$conn) )
{
    $msg = "1";
}
else
    $msg = "Can't store your business ".mysql_error() ;
    
$xmldata = '<?xml version="1.0" encoding="UTF8"?><result>';
$xmldata .= '<pagecontent><message>'.$msg.'</message>';
echo $xmldata .= '</pagecontent></result>';
?>