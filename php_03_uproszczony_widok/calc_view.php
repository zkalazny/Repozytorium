<?php 
include _ROOT_PATH.'/templates/top.php';
?>

<h3>Prosty kalkulator kredytowy</h2>

<form class ="pure-form pure-form-stacked" action="<?php print(_APP_ROOT);?>/app/calc.php" method="post">
<fieldset>
	<label for="id_x">Kwota:  </label>
	<input id="id_x" type="text" placeholder ="wartość x" name="x" value="<?php out($form['x']); ?>">	
	<label for="id_y">Lat: </label>
	<input id="id_y" type="text" placeholder ="wartość y" name="y" value="<?php out($form['y']); ?>">
	<label for="id_op">Oprocentowanie(%):  </label>
	<select id="id_op" name="op">
		<option value="2">2%</option>
		<option value="4">4%</option>
		<option value="6">6%</option>
		<option value="8">8%</option>
	</select>
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>	

<div class="messages">
<?php
if (isset($messages)) {
	if (count ( $messages ) > 0) {
	echo '<h4>Wystąpiły błędy: </h4>';
	echo '<ol class="err">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>
<?php
if (isset($infos)) {
	if (count ( $infos ) > 0) {
	echo '<h4>Informacje: </h4>';
	echo '<ol class="inf">';
		foreach ( $infos as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>
<?php if (isset($result)){ ?>
	<h4>Twoja miesięczna rata wynosi:</h4>
	<p class="res">
<?php print($result); ?>
	</p>
<?php } ?>

</div>

<?php
include _ROOT_PATH.'/templates/bottom.php';
?>