<script>
function nextPhone(thisBox,max) {
	if (thisBox.value.length >= max) {
		switch(thisBox.name) {
		case "phone1":
			document.taxi.phone2.focus();
			break;
		case "phone2":
			document.taxi.phone3.focus();
			break;
		}
	}
}
</script>


<div id="mainContent">

<div id="menu">
	FIND A TAXI
</div>
<div name="taxi" id="written">
	<form action="">
	<table>
	<tr>
		<td>Phone Number</td>
		<td>(<input type="text" name="phone1" size="2" maxlength="3" onKeyUp="nextPhone(this,3);">)
			<input type="text" name="phone2" size="2" maxlength="3" onKeyUp="nextPhone(this,3);">-
			<input type="text" name="phone3" size="3" maxlength="4"></td>
	</tr>
	<tr>
		<td>Your Location</td>
		<td><input type="text" name="location" size="40" maxlength="200"><br>
			<input type="checkbox" name="useloc" value="useloc">
			<font size="2">Use your current location</font></td>
	</tr>
	<tr>
		<td>Destination</td>
		<td><input type="text" name="destination" size="40" maxlength="200"></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" value="Submit"></td>
	</tr>
	</table>
	</form>
</div>

</div>