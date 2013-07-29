<?php
$serverName = "MOTHERSHIP\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array( "Database"=>"ACIMS");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}
require_once('functions.php');
  if (isset($_POST['changes']) && $_POST['changes']) {
  	 foreach ($_POST['changes'] as $change) {
	  $rowId  = $change[0] + 1;
      $colId  = $change[1];
      $newVal = $change[3];
	  echo "row $rowId column $colId will be changed to $newVal";
	 }
  }
  $colMap = array(
    0 => 'Full_Name',
    1 => 'Facility_Type',
    2 => 'State'
  );
  $update_id=$rowId;
  $column=$colMap[$colId];
  $query="update FACILITIES set $column='$newVal' where OBJECTID=$rowId";
  sqlsrv_query( $conn, $query );
  if (isset($_POST['changes']) && $_POST['changes']) {
    foreach ($_POST['changes'] as $change) {
      $rowId  = $change[0] + 1;
      $colId  = $change[1];
      $newVal = $change[3];
      
      if (!isset($colMap[$colId])) {
        echo "\n spadam";
        continue;
      }
	}
  }
//var_dump($_POST);