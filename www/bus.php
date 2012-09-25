<?php

function getBusStops() {
	// Connect to MySQL server
	$stops = array(
		"1000 - Main at Emerson",
		"1001 - Main at Haddon",
		"1002 - Main at Hess",
		"1003 - Main at John",
		"1004 - King at Sterling");
	return $stops;
}

function dropDown($fname, $array) {
	$output = '<select name="' . $fname . '">';
	foreach ($array as $element) {
		$output .= '<option value="' . $element . '">';
		$output .= $element;
		$output .= '</option>';
	}
	$output .= '</select>';
	return $output;
}

?>

<div id="content">
<div id="mainContent">

<div id="menu">
	FIND A BUS
</div>
<div id="written">
	<form action=''>
	<table>
	<tr>
		<td>Bus Stop #:</td>
		<td><?php echo dropDown('bus_stops',getBusStops()); ?></td>
	</tr>
	</table>
	</form>
</div>

</div>
</div>