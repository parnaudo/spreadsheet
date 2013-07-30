<?php 
include 'constants.php';

if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT top 100 * FROM FACILITIES";
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
