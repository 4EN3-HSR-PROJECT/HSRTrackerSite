<?php

$sql_username = 'localhost';
$sql_password = '';
$sql_database = '';

function getBusStops() {
	$query = 'SELECT stop_no,stop_name FROM bus_stops ORDER BY stop_no';
	$db = mysql_connect($sql_username,$sql_password,$sql_database);
	if (!$db) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($sql_database,$db);
	$result = mysql_query($query);
	$counter = 0;
	while ($row = mysql_fetch_array($db)) {
		$stops[$counter] = $row['stop_no'] . ' - ' . $row['stop_name'];
	}
	return $stops;
}

function getBusRoutes($stop) {
	if ($stop == "") {
		return array();
	}
	$query = 'SELECT route_no FROM bus_routes WHERE stops LIKE "%' . $stop . '%" ORDER BY route_no';
	$db = mysql_connect($sql_username,$sql_password,$sql_database);
	if (!$db) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($sql_database,$db);
	$result = mysql_query($query);
	$counter = 0;
	while ($row = mysql_fetch_array($db)) {
		$routes[$counter] = $row['route_no'];
	}
	return $routes;
}

?>