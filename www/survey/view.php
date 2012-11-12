<?php

// Define common functions
function bool ($val) {
	if ($val == 1) {
		return 'Yes';
	} else {
		return 'No';
	}
}

// Obtain database data
$db_name = 'hsr_stats';
$db_table = 'survey';

// Connect to database
include '/var/www/db.php';
$connected = mysql_query('use ' . $db_name);
if (!$connected) {
	die('Could not connect to database: ' . mysql_error());
}

// Perform query
$result = mysql_query('select * from ' . $db_table . ' order by id');
if (!$result) {
	$message = "Invalid query: " . mysql_error() . "<br>";
	$message .= "Whole query: " . $query;
	die($message);
}

// Prepare output
$output = '<table border=1 cellpadding="4px" width="100%">
		<tr>
			<th>ID</th>
			<th>Use School</th>
			<th>Use Work</th>
			<th>Use Other</th>
			<th>Frequency</th>
			<th>Route 51</th>
			<th>Route 1A</th>
			<th>Route 5C</th>
			<th>Route B-Line</th>
			<th>Length</th>
			<th>Phonecheck</th>
			<th>Home</th>
			<th>E-Mail</th>
		</tr>';
while ($row = mysql_fetch_assoc($result)) {
	// Start
	$output .= "<tr>";
	
	// ID
	$output .= "<td>{$row['id']}</td>";
	
	// Use_School
	$output .= "<td>";
	//$output .= bool($row['use_school']);
	if ($row['use_school']) {
		$output .= 'School';
	} else {
		$output .= '-';
	}
	$output .= "</td>";
	
	// Use_Work
	$output .= "<td>";
	//$output .= bool($row['use_work']);
	if ($row['use_work']) {
		$output .= 'Work';
	} else {
		$output .= '-';
	}
	$output .= "</td>";
	
	// Use_Other
	$output .= "<td>";
	//$output .= bool($row['use_other']);
	if ($row['use_other']) {
		$output .= 'Other';
	} else {
		$output .= '-';
	}
	$output .= "</td>";
	
	// Freq
	$output .= "<td>";
	switch ($row['freq']) {
		case 0:
			$output .= "0";
			$output .= " daily";
			break;
		case 1:
			$output .= "1-3";
			$output .= " daily";
			break;
		case 4:
			$output .= "4-6";
			$output .= " daily";
			break;
		case 7:
			$output .= "7+";
			$output .= " daily";
			break;
		case -1:
			$output .= "Few/week";
			break;
	}
	$output .= "</td>";
	
	// Route_51
	$output .= "<td>";
	//$output .= bool($row['route_51']);
	if ($row['route_51']) {
		$output .= 'Route 51';
	} else {
		$output .= '-';
	}
	$output .= "</td>";
	
	// Route_1A
	$output .= "<td>";
	//$output .= bool($row['route_1A']);
	if ($row['route_1A']) {
		$output .= 'Route 1A';
	} else {
		$output .= '-';
	}
	$output .= "</td>";
	
	// Route_5C
	$output .= "<td>";
	//$output .= bool($row['route_5C']);
	if ($row['route_5C']) {
		$output .= 'Route 5C';
	} else {
		$output .= '-';
	}
	$output .= "</td>";
	
	// Route_BLine
	$output .= "<td>";
	//$output .= bool($row['route_bline']);
	if ($row['route_bline']) {
		$output .= 'B-Line';
	} else {
		$output .= '-';
	}
	$output .= "</td>";
	
	// Length
	$output .= "<td>";
	switch ($row['length']) {
		case 45:
			$output .= $row['length'] . "+";
			break;
		default:
			$output .= $row['length'];
	}
	$output .= " min";
	$output .= "</td>";
	
	// Phonecheck
	$output .= "<td>";
	switch ($row['phonecheck']) {
		case 1:
			$output .= "Constantly";
			break;
		case 5:
			$output .= "5 min";
			break;
		case 10:
			$output .= "10+ min";
			break;
		case 0:
			$output .= "Never";
			break;
	}
	$output .="</td>";
	
	// Home
	$output .= "<td>";
	switch ($row['home']) {
		case 1:
			$output .= "McMaster";
			break;
		case 2:
			$output .= "Downtown";
			break;
		case 3:
			$output .= "Dundas";
			break;
		case 4:
			$output .= "Ancaster";
			break;
		case 5:
			$output .= "Stoney Creek";
			break;
		case 6:
			$output .= "Flamborough";
			break;
		case 0:
			$output .= "Other";
			break;
	}
	$output .="</td>";
	
	// E-mail
	$output .= "<td>";
	if ($row['email'] != "") {
		$output .= "<i>(hidden)</i>";
	}
	$output .= "</td>";
	
	// End
	$output .= "</tr>";
}
$output .= '</table>';


// Print output
echo $output;

?>