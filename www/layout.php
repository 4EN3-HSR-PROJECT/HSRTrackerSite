<?php


function site_header ($title) {
	$page_header = '<head>
					<title>Hamilton Transit Helper - ' . $title . '</title>
					<link rel="stylesheet" type="text/css" href="master.css">
					<script src="jquery.js" type="text/javascript"></script>
					</head>';
	return ($page_header
	      /*. $page_title
		  . $page_menubar*/);
}

function site_menubar ($selected) {
	$page_menubar = '<div id="menubar">
					<table cellpadding=8><tr>
					<td>
						<a href="?page=main" style="text-decoration: none">
						<div id="menubar_entry">
						<b>
						Home
						</b>
						</div>
						</a>
					</td>
					<td>
						<a href="?page=bus" style="text-decoration: none">
						<div id="menubar_entry">
						<b>
						Find a Bus
						</b>
						</div>
						</a>
					</td>
					<td>
						<a href="?page=taxi" style="text-decoration: none">
						<div id="menubar_entry">
						<b>
						Find a Taxi
						</b>
						</div>
						</a>
					</td>
					<td>
						<a href="?page=plan" style="text-decoration: none">
						<div id="menubar_entry">
						<b>
						Plan your Trip
						</b>
						</div>
						</a>
					</td>
					</tr></table>
					</div>';
	return $page_menubar;
}


?>