<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="get">
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
	<br />
	<input type="submit" value="Oblicz" />
</form>	

<?php
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
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

</body>
</html>