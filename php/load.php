<?php 
$serverName = "MOTHERSHIP\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array( "Database"=>"ACIMS");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT OBJECTID,Full_Name,Facility_Type,State FROM FACILITIES";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
 
$test=array();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
	$data[]=$row;	  

}
	$out=array('data'=>$data);


$json= json_encode($out);
echo $json;
/*
echo '{
  "data": ['.$json.']}';
/*
echo '{
  "data": [
    ["", "Kia", "Nissan", "Toyota", "Honda"],
    ["2008", 10, 11, 12, 13],
    ["2009", 20, 11, 14, 13],
    ["2010", 46, 15, 12, 13]
  ]
}';*/