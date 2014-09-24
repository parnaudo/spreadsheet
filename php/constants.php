<?php
$server='MOTHERSHIP';
$engine='SQLEXPRESS';
$database='';
$serverName = $server.'\\'.$engine; //serverName\instanceName
$connectionInfo = array( "Database"=>"$database");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
