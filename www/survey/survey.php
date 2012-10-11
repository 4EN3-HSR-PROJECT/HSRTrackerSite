<script>
function emailBox (status) {
	var output = '';
	if (status == 1) {
		output += 'E-Mail Address:';
		output += '<div id="surveyanswer">';
		output += '<input type="text" name="email" maxlength=256 size=40';
		output += '></div>';
	}
	document.getElementById('emailsect').innerHTML = output;
}
</script>

<form action="survey/submit.php" method="post">

What do you use the bus for?
<div id="surveyanswer">
	<input type="hidden" name="use_school" value=0>
	<input type="checkbox" name="use_school" value=1> School<br>
	<input type="hidden" name="use_work" value=0>
	<input type="checkbox" name="use_work" value=1> Work<br>
	<input type="hidden" name="use_other" value=0>
	<input type="checkbox" name="use_other" value=1> Other<br>
</div><br><br>

How often do you take the bus per day?
<div id="surveyanswer">
<select name="freq">
	<option value=NULL style="display:none;"></option>
	<option value=0>0</option>
	<option value=1>1-3</option>
	<option value=4>4-6</option>
	<option value=7>7+</option>
	<option value=-1>A few times a week</option>
</select>
</div><br><br>

Which of the following buses do you take most often?
<div id="surveyanswer">
	<input type="hidden" name="route_51" value="0">
	<input type="checkbox" name="route_51" value=1> 51 - University<br>
	<input type="hidden" name="route_1A" value="0">
	<input type="checkbox" name="route_1A" value=1> 1A - King<br>
	<input type="hidden" name="route_5C" value="0">
	<input type="checkbox" name="route_5C" value=1> 5C - Delaware<br>
	<input type="hidden" name="route_bline" value="0">
	<input type="checkbox" name="route_bline" value=1> B-Line<br>
</div><br><br>

On average, how long is your bus ride?
<div id="surveyanswer">
<select name="length">
	<option value=NULL style="display:none;"></option>
	<option value=5>5 minutes</option>
	<option value=10>10 minutes</option>
	<option value=15>15 minutes</option>
	<option value=30>30 minutes</option>
	<option value=45>45+ minutes</option>
</select>
</div><br><br>

How often do you check your phone during your bus ride?
<div id="surveyanswer">
<select name="phonecheck">
	<option value=NULL style="display:none;"></option>
	<option value=1>Constantly</option>
	<option value=5>Every 5 minutes</option>
	<option value=10>Every 10+ minutes</option>
	<option value=0>Never</option>
</select>
</div><br><br>

In what area do you live?
<div id="surveyanswer">
<select name="home">
	<option value=NULL style="display:none;"></option>
	<option value=1>McMaster Area</option>
	<option value=2>Downtown Hamilton</option>
	<option value=3>Dundas</option>
	<option value=4>Ancaster</option>
	<option value=5>Stoney Creek</option>
	<option value=6>Flamborough</option>
	<option value=0>Other</option>
</select>
</div><br><br>

Would you consider helping us test this app?
<div id="surveyanswer">
	<input type="radio" name="tester" value=1 onclick="emailBox(1)" checked> Yes<br>
	<input type="radio" name="tester" value=0 onclick="emailBox(0)"> No
</div><br>
<div id="emailsect">
E-Mail Address:
<div id="surveyanswer">
	<input type="text" name="email" maxlength=256 size=40>
</div>
</div><br><br>

<input type="submit">

</form>