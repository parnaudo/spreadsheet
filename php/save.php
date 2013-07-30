<?php
include 'constants.php';
$serverName = $server.'\\'.$engine; //serverName\instanceName
$connectionInfo = array( "Database"=>"$database");
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
  	0 => 'OBJECTID',
    1 => 'Full_Name',
	2 => 'Facility_ID',
    3 => 'Facility_Type',
    4 => 'State',
    5 => 'City',
	6 => 'ATC_Status',
    7 => 'ANS_System_Status',
    8 => 'Current_Readiness_Level',
	9 => 'ATO_Personnel_Accounting',
	10 => 'Last_Updated_AIRMAC',
    11 => 'Last_Updated_Source',
    12 => 'General_Comments',
    13 => 'Airport_Ops_Status_Comments',
	14 => 'ATC_Status_Comments',
    15 => 'ANS_Sys_Status_Comments',
    16 => 'ATO_Pers_Status_Comments',
	17 => 'Overlying_ATC_Facility',
	18 => 'ATO_Terminal_District_Office',
    19 => 'Latitude',
    20 => 'Longitude',
    21 => 'Status',
	22 => 'IWA',
    23 => 'IWL',
    24 => 'Shape'
  );
  $update_id=$rowId;
  $column=$colMap[$colId];
  $query="update FACILITIES set $column='$newVal' where OBJECTID=$rowId";
  echo $query;
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