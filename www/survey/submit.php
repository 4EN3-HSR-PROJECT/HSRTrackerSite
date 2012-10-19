<?php
/**************************
 * Initialize error flags *
 **************************/
$error['freq'] = false;
$error['length'] = false;
$error['home'] = false;
$error['phonecheck'] = false;
$error['tester'] = false;
$error['email'] = false;


/********************
 * Secure variables *
 ********************/



/********************
 * Check for errors *
 ********************/
if ($_POST['freq'] == NULL | $_POST['freq'] == "NULL") {
	$error['freq'] = true;
}
if ($_POST['length'] == "NULL") {
	$error['length'] = true;
}
if ($_POST['phonecheck'] == "NULL") {
	$error['phonecheck'] = true;
}
if ($_POST['home'] == "NULL") {
	$error['home'] = true;
}
if (!isset($_POST['tester'])) {
	$error['tester'] = true;
} else {
	if ($_POST['tester'] & $_POST['email'] == "") {
		$error['email'] = true;
	}
}


/***************************
 * Submit data to database *
 ***************************/
function submit () {
	global $email;
	// Obtain database data
	$db_name = 'hsr_stats';
	$db_table = 'survey';
	
	// Connect to database
	include '/var/www/db.php';
	$connected = mysql_query('use ' . $db_name);
	if (!$connected) {
		die('Could not connect to database: ' . mysql_error());
	}
	
	// Create secured variables
	$use_school = mysql_real_escape_string($_POST['use_school']);
	$use_work = mysql_real_escape_string($_POST['use_work']);
	$use_other = mysql_real_escape_string($_POST['use_other']);
	$freq = mysql_real_escape_string($_POST['freq']);
	$route_51 = mysql_real_escape_string($_POST['route_51']);
	$route_1A = mysql_real_escape_string($_POST['route_1A']);
	$route_5C = mysql_real_escape_string($_POST['route_5C']);
	$route_bline = mysql_real_escape_string($_POST['route_bline']);
	$length = mysql_real_escape_string($_POST['length']);
	$phonecheck = mysql_real_escape_string($_POST['phonecheck']);
	$home = mysql_real_escape_string($_POST['home']);
	$email = mysql_real_escape_string($_POST['email']);
	
	// Prepare query
	$query = "INSERT INTO {$db_table} (
		use_school,
		use_work,
		use_other,
		freq,
		route_51,
		route_1A,
		route_5C,
		route_bline,
		length,
		phonecheck,
		home,
		email
	) VALUES (
		{$use_school},
		{$use_work},
		{$use_other},
		{$freq},
		{$route_51},
		{$route_1A},
		{$route_5C},
		{$route_bline},
		{$length},
		{$phonecheck},
		{$home},
		{$email}
	)";

	// Insert data into database
	$result = mysql_query($query);
	if (!$result) {
		return false;
		die('Invalid query: ' . mysql_error() . '<br>'
			. 'Full Query: ' . $query);
	}

	return true;
}

?>