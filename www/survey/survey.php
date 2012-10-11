<form action="survey/submit.php" method="post">
<table>
<tr>
	<td>First name:</td>
	<td><input type="text" name="firstname"></td>
</tr>
<tr>
	<td>Last name:</td>
	<td><input type="text" name="lastname"></td>
</tr>
<tr>
	<td>Gender:</td>
	<td>
		<input type="radio" name="sex" value="male">Male<br>
		<input type="radio" name="sex" value="female">Female
	</td>
</tr>
<tr>
	<td>I have a...</td>
	<td>
		<input type="checkbox" name="vehicle" value="Bike">Bicycle<br>
		<input type="checkbox" name="vehicle" value="Car">Car
	</td>
</tr>
<tr>
	<td colspan=2 align="center"><input type="submit" value="Submit"></td>
</tr>
</table>
</form>