<?php 
include 'constants.php';
$serverName = $server.'\\'.$engine; //serverName\instanceName
$connectionInfo = array( "Database"=>"$database");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}
$value=$_POST['query'];
$column=$_POST['column'];
$sql = "SELECT top 10 * FROM FACILITIES where $column like '%$value%'";

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
