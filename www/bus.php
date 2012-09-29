<?php

function dropDown($fname, $array, $action) {
	$output = '<select name="' . $fname . '"';
	if ($action != '') {
		$output .= ' ' . $action;
	}
	$output .= '>';
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

<script>
function getBusRoutes (stop) {
	if (stop == "") {
		return new Array();
	}
	var query = 'SELECT route_no FROM bus_routes WHERE stops LIKE "%' + stop + '%" ORDER BY route_no';
	// Use imported MySQL data
	var routes = new Array(
		"1A",
		"1B",
		"3D",
		"5A");
	return routes;
}
</script>

<div id="mainContent">

<div id="menu">
	FIND A BUS
</div>
<div id="written">
	<form action="">
	<table cellpadding="5">
	<tr>
		<td>Bus Stop #:</td>
		<td><?php echo dropDown('bus_stops',getBusStops(),'onchange="getBusRoutes( $(\"#bus_stops\").val() )"'); ?></td>
	</tr>
	<tr>
		<td>Bus Route:</td>
		<td><?php echo dropDown('bus_routes',getBusRoutes(""),""); ?></td>
	</tr>
	</table>
	</form>
</div>

</div>