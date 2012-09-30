<script>
function getDropdown(div,param = "",change = "") {
	// Initialize page getters
	var sqlconnect;
	var dropdown;
	if (window.XMLHttpRequest) {
		sqlconnect = new XMLHttpRequest();
		dropdown = new XMLHttpRequest();
	} else {
		sqlconnect = new ActiveXObject("Microsoft.XMLHTTP");
		dropdown = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	// Prepare actions for getting array
	var serialArray;
	sqlconnect.onreadystatechange = function() {
		if (sqlconnect.readyState == 4 && sqlconnect.status == 200) {
			// Send request for dropdown
			serialarray = sqlconnect.responseText;
			var address = "dropdown.php?array=" + serialarray;
			if (change != "") {
				address += "&alter=" + change;
			}
			if (param != "") {
				address += "&" + param;
			}
			dropdown.open("GET",address,true);
			dropdown.send();
		}
	}
	
	// Prepare actions for getting dropdown
	dropdown.onreadystatechange = function() {
		if (dropdown.readyState == 4 && dropdown.status == 200) {
			//$('#' + div).innerHTML = dropdown.responseText;
			document.getElementById(div).innerHTML = dropdown.responseText;
		}
	}
	
	// Send request for sql array
	if (param == "") {
		sqlconnect.open("GET","sqlConnector.php",true);
	} else {
		sqlconnect.open("GET","sqlConnector.php?" + param,true);
	}
	sqlconnect.send();
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
		<td><div name="stops" id="stops"><!--Stop Dropdown--></div></td>
	</tr>
	<tr>
		<td>Bus Route:</td>
		<td><div name="routes" id="routes"><!--Route Dropdown--></div></td>
	</tr>
	</table>
	</form>
	<script>
		getDropdown("stops","request=stops","routes");
		getDropdown("routes","request=routes");
	</script>
</div>

</div>