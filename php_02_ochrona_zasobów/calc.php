<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$x,&$y,&$percentage){
	$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$percentage = isset($_REQUEST['p']) ? $_REQUEST['p'] : null;	
}
function validate(&$x,&$y,&$percentage,&$messages){
	if ( ! (isset($x) && isset($y) && isset($percentage))) {
		
		return false;
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
if (count ( $messages ) != 0) return false;
	
	if (! is_numeric( $x )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	

	if (count ( $messages ) != 0) return false;
	else return true;
}
function process(&$x,&$y,&$percentage,&$messages,&$result){
	global $role;
	
	$x = floatval($x);
	$y = floatval($y);
	$month = 0;
	$loan = 0;
	$percent = 0;

switch ($percentage) {
		case '4' :
		if ($role == 'admin') {
			$month = $y*12;
			$loan = $x/$month;
			$percent = ((4*$loan)/100);
			$result = $loan + $percent;
		} else {
			$messages [] = 'Tylko administrator może obliczać ratę dla 4%';
		}
			break;
		case '6' :
			$month = $y*12;
			$loan = $x/$month;
			$percent = ((6*$loan)/100);
			$result = $loan + $percent;
			break;
		case '8' :
		if ($role == 'admin') {
			$month = $y*12;
			$loan = $x/$month;
			$percent = ((8*$loan)/100);
			$result = $loan + $percent;
		} else {
			$messages [] = 'Tylko administrator może obliczać ratę dla 8%';
		}
			break;
		default :
			$month = $y*12;
			$loan = $x/$month;
			$percent = ((2*$loan)/100);
			$result = $loan + $percent;
			break;
	}
}
$x = null;
$y = null;
$percentage = null;
$result = null;
$messages = array();

getParams($x,$y,$percentage);
if ( validate($x,$y,$percentage,$messages) ) {
	process($x,$y,$percentage,$messages,$result);
}
include 'calc_view.php';
	
