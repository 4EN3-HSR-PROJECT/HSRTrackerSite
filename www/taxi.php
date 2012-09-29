<script type="text/javascript">
function checkValidity(action) {
	alert("Started!");
	var valid = true;
	if (document.getElementsByName("phone1").value.length != 3) {
		valid = false;
		alert("Please enter a valid phone number!");
	} else if (document.getElementsByName("phone2").value.length != 3) {
		valid = false;
		alert("Please enter a valid phone number!");
	} else if (document.getElementsByName("phone3").value.length != 4) {
		valid = false;
		alert("Please enter a valid phone number!");
	} else if (document.getElementsByName("location").value.length < 4) {
		valid = false;
		alert("Please enter your location!");
	}
	alert(valid);
	
	switch (action) {
	case 0:
		calcFare();
		break;
	case 1:
		sendRequest();
		break;
	default:
		alert("There seems to be a problem!");
		break;
	}
}

function calcFare(start,end) {
}

function sendRequest() {
}
</script>


<div id="mainContent">

<div id="menu">
	FIND A TAXI
</div>
<div id="written">
	<form name="taxi" action="">
	<table cellpadding="5">
	<tr>
		<td>Phone Number</td>
		<td>(<input type="text" name="phone1" id="phone1" size="2" maxlength="3">)
			<input type="text" name="phone2" id="phone2" size="2" maxlength="3"> -
			<input type="text" name="phone3" id="phone3"size="3" maxlength="4"></td>
	</tr>
	<tr>
		<td>Your Location</td>
		<td><input type="text" name="location" id="location" size="40" maxlength="200"></td>
	</tr>
	<tr>
		<td>Destination</td>
		<td><input type="text" name="destination" id="destination" size="40" maxlength="200"></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<button name="calc" type="button" onclick="checkValidity(0)">Calculate Fare</button>
			<button name="request" type="button" onclick="checkValidity(1)">Request a Taxi</button>
		</td>
	</tr>
	</table>
	</form>
</div>

</div>