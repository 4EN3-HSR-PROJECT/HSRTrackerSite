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
 * Check for errors *
 ********************/
$email = "";
if (isset($_POST['email'])) {
	$email = $_POST['email'];
}

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
	if ($email == "") {
		$error['email'] = true;
	}
}


/***************************
 * Submit data to database *
 ***************************/
function submit () {
	// Obtain database data
	$db_name = 'hsr_stats';
	$db_table = 'survey';
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
		{$_POST['use_school']},
		{$_POST['use_work']},
		{$_POST['use_other']},
		{$_POST['freq']},
		{$_POST['route_51']},
		{$_POST['route_1A']},
		{$_POST['route_5C']},
		{$_POST['route_bline']},
		{$_POST['length']},
		{$_POST['phonecheck']},
		{$_POST['home']},
		\"{$email}\"
	)";

	// Connect to database
	include '/var/www/db.php';
	$connected = mysql_query('use ' . $db_name);
	if (!$connected) {
		die('Could not connect to database: ' . mysql_error());
	}

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