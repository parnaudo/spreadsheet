<?php 
include 'constants.php';


if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}
$value=$_POST['query'];
$column=$_POST['column'];
$sqltable=$_POST['sqltable'];
$sql = "SELECT top 1 * FROM $sqltable where $column like '%$value%'";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
 
$test=array();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
	$row['Shape']='';
	$data[]=$row;	  

}
	$out=array('data'=>$data);


$json= json_encode($out);
echo $json;
