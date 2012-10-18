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
if ($_POST['freq'] == NULL) {
	$error['freq'] = true;
} else if ($_POST['length'] == NULL) {
	$error['length'];
} else if ($_POST['home'] == NULL) {
	$error['home'];
} else if ($_POST['phonecheck'] == NULL) {
	$error['phonecheck'];
} else if (!isset($_POST['tester'])) {
	$error['tester'];
} else if ($_POST['tester']) {
	if (!isset($_POST['email']) | $_POST['email'] == "") {
		$error['email'];
	}
}

// If an error has occurred, redirect back to the form
if (in_array(true,$error)) {
	echo 'Error<br>';
} else {
	echo 'No error<br>';
}


/***************************
 * Submit data to database *
 ***************************/
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
	die('Invalid query: ' . mysql_error() . '<br>'
		. 'Full Query: ' . $query);
}

// Show completion message
echo 'Your survey has been submitted successfully!';

?>