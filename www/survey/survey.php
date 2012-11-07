<?php
	// Determine if any errors exist from submission
	function error ($str) {
		global $error;
		if (isset($error)) {
			return ($error[$str]);
		} else {
			return false;
		}
	}
	
	// Select previously submitted values
	function select_check ($entry) {
		if(isset($_POST[$entry])) {
			if ($_POST[$entry]) {
				return 'checked';
			}
		}
		return '';
	}
	
	function select_dropdown ($menu, $entry) {
		if (isset($_POST[$menu])) {
			if ($_POST[$menu] == $entry) {
				return 'selected';
			}
		}
		return '';
	}
	
	function select_radio ($set, $entry) {
		if (isset($_POST[$set])) {
			if ($_POST[$set] == $entry) {
				return 'checked';
			}
		}
		return '';
	}
	
	// If submission, check values
	if (isset($_POST['submitted'])) {
		include 'survey/submit.php';
		if (!in_array(true,$error)) {
			// Submit query
			if (submit()) {
				// Successful submission
				echo '<table border=2 bordercolor=green cellpadding="10px">
					<tr><td>
					Survey submitted successfully!
					</td></tr>
					</table>';
			} else {
				// Failed submission
				echo '<table border=2 bordercolor=red cellpadding="10px">
					<tr><td>
					<img src="error.png">
					It appears that you have already taken the survey or someone else has used your e-mail
					address. If this is not the case, please
						<a href="mailto:hsrtracker@gmail.com?subject=HSRTracker-Bug-Report">contact us</a>
					and we will fix it for you.<br><br>
					Thank you for your patience!
					</td></tr>
					</table>';
			}
			die();
		} else {
			// Show error box at top
			echo '<table border=2 bordercolor=red cellpadding="10px">
				<tr><td>
				<img src="error.png">
				Your submission was incomplete and needs revision.
				</td></tr>
				</table>';
		}
	}
?>

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

<form action="" method="post">

<!-- Hidden submission variable -->
<input type="hidden" name="submitted">

What do you use the bus for?
<div id="surveyanswer">
	<input type="hidden" name="use_school" value=0>
	<input type="checkbox" name="use_school" value=1 <?php echo select_check('use_school') ?>> School<br>
	<input type="hidden" name="use_work" value=0>
	<input type="checkbox" name="use_work" value=1 <?php echo select_check('use_work') ?>> Work<br>
	<input type="hidden" name="use_other" value=0>
	<input type="checkbox" name="use_other" value=1 <?php echo select_check('use_other') ?>> Other<br>
</div><br><br>

<?php if (error('freq')) {echo '<img src="error.png">';} ?>
How often do you take the bus per day?
<div id="surveyanswer">
<select name="freq">
	<option value=NULL style="display:none;"></option>
	<option value=0 <?php echo select_dropdown('freq',0) ?>>0</option>
	<option value=1 <?php echo select_dropdown('freq',1) ?>>1-3</option>
	<option value=4 <?php echo select_dropdown('freq',4) ?>>4-6</option>
	<option value=7 <?php echo select_dropdown('freq',7) ?>>7+</option>
	<option value=-1 <?php echo select_dropdown('freq',-1) ?>>A few times a week</option>
</select>
</div><br><br>

Which of the following buses do you take most often?
<div id="surveyanswer">
	<input type="hidden" name="route_1A" value="0">
	<input type="checkbox" name="route_1A" value=1 <?php echo select_check('route_1A') ?>> 1A - King<br>
	<input type="hidden" name="route_5C" value="0">
	<input type="checkbox" name="route_5C" value=1 <?php echo select_check('route_5C') ?>> 5C - Delaware<br>
	<input type="hidden" name="route_bline" value="0">
	<input type="checkbox" name="route_bline" value=1 <?php echo select_check('route_bline') ?>> 10 - B-Line<br>
	<input type="hidden" name="route_51" value="0">
	<input type="checkbox" name="route_51" value=1 <?php echo select_check('route_51') ?>> 51 - University<br>
</div><br><br>

<?php if (error('length')) {echo '<img src="error.png">';} ?>
On average, how long is your bus ride?
<div id="surveyanswer">
<select name="length">
	<option value=NULL style="display:none;"></option>
	<option value=5 <?php echo select_dropdown('length',5) ?>>5 minutes</option>
	<option value=10 <?php echo select_dropdown('length',10) ?>>10 minutes</option>
	<option value=15 <?php echo select_dropdown('length',15) ?>>15 minutes</option>
	<option value=30 <?php echo select_dropdown('length',30) ?>>30 minutes</option>
	<option value=45 <?php echo select_dropdown('length',45) ?>>45+ minutes</option>
</select>
</div><br><br>

<?php if (error('phonecheck')) {echo '<img src="error.png">';} ?>
How often do you check your phone during your bus ride?
<div id="surveyanswer">
<select name="phonecheck">
	<option value=NULL style="display:none;"></option>
	<option value=1 <?php echo select_dropdown('phonecheck',1) ?>>Constantly</option>
	<option value=5 <?php echo select_dropdown('phonecheck',5) ?>>Every 5 minutes</option>
	<option value=10 <?php echo select_dropdown('phonecheck',10) ?>>Every 10+ minutes</option>
	<option value=0 <?php echo select_dropdown('phonecheck',0) ?>>Never</option>
</select>
</div><br><br>

<?php if (error('home')) {echo '<img src="error.png">';} ?>
In what area do you live?
<div id="surveyanswer">
<select name="home">
	<option value=NULL style="display:none;"></option>
	<option value=1 <?php echo select_dropdown('home',1) ?>>McMaster Area</option>
	<option value=2 <?php echo select_dropdown('home',2) ?>>Downtown Hamilton</option>
	<option value=3 <?php echo select_dropdown('home',3) ?>>Dundas</option>
	<option value=4 <?php echo select_dropdown('home',4) ?>>Ancaster</option>
	<option value=5 <?php echo select_dropdown('home',5) ?>>Stoney Creek</option>
	<option value=6 <?php echo select_dropdown('home',6) ?>>Flamborough</option>
	<option value=0 <?php echo select_dropdown('home',0) ?>>Other</option>
</select>
</div><br><br>

<?php if (error('tester')) {echo '<img src="error.png">';} ?>
Would you consider helping us test this app?
<div id="surveyanswer">
	<input type="radio" name="tester" value=1 onclick="emailBox(1)" checked> Yes<br>
	<input type="radio" name="tester" value=0 onclick="emailBox(0)"> No
</div><br>
<input type="hidden" name="email" value="">
<div id="emailsect">
<?php if (error('email')) {echo '<img src="error.png">';} ?>
E-Mail Address:
<div id="surveyanswer">
	<input type="text" name="email" maxlength=256 size=40
	<?php if (isset($_POST['email'])) {
			echo ' value=' . $_POST['email'];
		} ?>
	>
</div>
</div><br><br>

<input type="submit">

</form>