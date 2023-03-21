<?php

require_once dirname(__FILE__).'/../config.php';

$x = $_REQUEST ['x'];
$y = $_REQUEST ['y'];
$percentage = $_REQUEST ['p'];


if ( ! (isset($x) && isset($y) && isset($percentage))) {
	
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}


if ( $x == "" || $x <= 0) {
	$messages [] = 'Nie podano kwoty lub jest ona mniejsza lub równa 0';
} else {
		if ($x < 1000) {
	$messages [] = 'Kwota nie może być mniejsza niż 1000 zł';
}
}

if ( $y == "" || $y <= 0) {
	$messages [] = 'Nie podano ilości lat lub jest ona mniejsza lub równa 0'; 
}


if (empty( $messages )) {
	
	
	if (! is_numeric( $x )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Druga wartość nie jest liczbą';
	}	

}

if (empty ( $messages )) {
	
	
	$x = floatval($x);
	$y = floatval($y);
	$month = 0;
	$loan = 0;
	$percent = 0;
	
	
	switch ($percentage) {
		case '4' :
			$month = $y*12;
			$loan = $x/$month;
			$percent = ((4*$loan)/100);
			$result = $loan + $percent;
			break;
		case '6' :
			$month = $y*12;
			$loan = $x/$month;
			$percent = ((6*$loan)/100);
			$result = $loan + $percent;
			break;
		case '8' :
			$month = $y*12;
			$loan = $x/$month;
			$percent = ((8*$loan)/100);
			$result = $loan + $percent;
			break;
		default :
			$month = $y*12;
			$loan = $x/$month;
			$percent = ((2*$loan)/100);
			$result = $loan + $percent;
			break;
	}
}

include 'calc_view.php';