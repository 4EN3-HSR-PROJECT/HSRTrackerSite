<html>
<?php

/********************
 * Import Libraries *
 ********************/
include 'interface_check.php';
$included_interface = function_exists('getInterface');
include 'layout.php';
$included_layout = function_exists('site_header');

?><body><?php

/***********************
 * Determine Interface *
 ***********************/
if ($included_interface) {
	if (isMobile(getInterface())) {
		// Mobile - redirect
		$mobile = true;
	} else {
		// Desktop - do not redirect
		$mobile = false;
	}
} else {
	// Interface checked missing - assume desktop
	$mobile = false;
}

if ($mobile) {
	echo '<head><meta http-equiv="Refresh" content="1;url=WebApp"></head>';
	die();
}

/**********************
 * Get Form Variables *
 **********************/
 // Default Values
 $page = 'main';
 $bus_stop = 0;
 $bus_route = 0;
 $taxi_phone = '';
 // Received values
 if (isset($_REQUEST['page'])) {
	$page = $_REQUEST['page'];
}
 if (isset($_REQUEST['bus_stop'])) {
	$bus_stop = $_REQUEST['bus_stop'];
}
if (isset($_REQUEST['bus_route'])) {
	$bus_route = $_REQUEST['bus_route'];
}
if (isset($_REQUEST['taxi_phone'])) {
	$taxi_phone = $_REQUEST['taxi_phone'];
}

/*****************
 * Generate Page *
 *****************/
switch ($page) {
	case 'main':
		if ($included_layout) {
			echo site_header('Get the App');
		}
		include 'main.php';
		break;
	case 'bus':
		if ($included_layout) {
			echo site_header('Find a Bus');
		}
		include 'bus.php';
		break;
	case 'taxi':
		if ($included_layout) {
			echo site_header('Find a Taxi');
		}
		include 'taxi.php';
		break;
	case 'plan':
		if ($included_layout) {
			echo site_header('Plan Your Trip');
		}
		include 'plan.php';
		break;
	default:
		echo 'An error has occurred!<br>';
		echo 'An attempted access to tab "' . $page . '" has been performed, but the tab does not exist.<br>';
		echo 'Please notify the website administrator!';
}

?></body>
</html>