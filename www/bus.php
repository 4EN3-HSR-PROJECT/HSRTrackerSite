<?php

function getBusStops() {
	$query = 'SELECT stop_no,stop_name FROM bus_stops ORDER BY stop_no';
	// Connect to MySQL server
	$stops = array(
		"1000 - Main at Emerson",
		"1001 - Main at Haddon",
		"1002 - Main at Hess",
		"1003 - Main at John",
		"1004 - King at Sterling");
	return $stops;
}

function getBusRoutes($stop) {
	$query = 'SELECT route_no FROM bus_routes WHERE stops LIKE "%' . $stop . '%" ORDER BY route_no';
	// Connect to MySQL server
	$routes = array(
		"1A",
		"1B",
		"3D",
		"5A");
	return $routes;
}

function dropDown($fname, $array) {
	$output = '<select name="' . $fname . '">';
	$output .= '<option value="" style="display:none;"></option>';
	foreach ($array as $element) {
		$output .= '<option value="' . $element . '">';
		$output .= $element;
		$output .= '</option>';
	}
	$output .= '</select>';
	return $output;
}

?>

<div id="mainContent">

<div id="menu">
	FIND A BUS
</div>
<div id="written">
	<form action="">
	<table>
	<tr>
		<td>Bus Stop #:</td>
		<td><?php echo dropDown('bus_stops',getBusStops()); ?></td>
	</tr>
	<tr>
		<td>Bus Route:</td>
		<td><?php echo dropDown('bus_routes',getBusRoutes()); ?></td>
	</tr>
	</table>
	</form>
</div>

</div>