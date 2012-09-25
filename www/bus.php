<?php

function getBusStops() {
	// Connect to MySQL server
	$stops = array(
		"1000 - Main at Emerson",
		"1001 - Main at ",
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
}

?>

<form action=''>
<table>
<tr>
	<td>Bus Stop #:</td>
	<td><?php echo dropDown(getBusStops()); ?></td>
</tr>
</table>
</form>