<?php

function getBusStops() {
	$query = 'SELECT number FROM bus_stops ORDER BY number';
	$db = mysql_connect('24.141.132.41','fielding','');
	if (!$db) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('hsr',$db);
	$result = mysql_query($query);
	if (!$result) {
		die('Could not run query: ' . mysql_error());
	}
	$counter = 0;
	while ($row = mysql_fetch_row($result)) {
		$stops[$counter] = $row['number'];
	}
	mysql_close($db);
	return $stops;
}

function getBusRoutes($stop) {
	if ($stop == "") {
		return array();
	}
	echo 'Stop: ' . $stop . '...';
	$query = 'SELECT bus_routes.number AS bus_number FROM bus_routes,route_stop,bus_stops WHERE bus_routes.number = route_no AND stop_no = bus_stops.number AND stop_no = ' . $stop . ' ORDER BY route_no';
	$db = mysql_connect('24.141.132.41','fielding','');
	if (!$db) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('hsr',$db);
	$result = mysql_query($query);
	if (!$result) {
		die('Could not run query: ' . mysql_error());
	}
	$counter = 0;
	while ($row = mysql_fetch_row($result)) {
		$routes[$counter] = $row['number'];
	}
	mysql_close($db);
	return $routes;
}

?>