<?php
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
	<title>Kalkulator kredytowy</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>
<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">kolejna chroniona strona</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>
<div style="width:90%; margin: 2em auto;">
<form action="<?php print(_APP_ROOT);?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
	<legend>Kalkulator kredytowy</legend>
	<fieldset>
	<label for="id_x">Kwota:  </label>
	<input id="id_x" type="text" name="x" value="<?php if (isset($x)) print($x); ?>" />
	<br />
	<label for="id_y">Lat: </label>
	<input id="id_y" type="text" name="y" value="<?php if (isset($y)) print($y); ?>" />
	<br />
	<label for="id_op">Oprocentowanie(%):  </label>
	<select name="p">
		<option value="2">2%</option>
		<option value="4">4%</option>
		<option value="6">6%</option>
		<option value="8">8%</option>
	</select>
	</fieldset>
	<br />
	<input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
</form>

<?php
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>
<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Twoja miesięczna rata wraz z oprocentowaniem wynosi: '.$result; ?>
</div>
<?php } ?>

</div>
</body>
</html>