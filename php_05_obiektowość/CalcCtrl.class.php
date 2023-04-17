<?php
require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';

class CalcCtrl {

	private $msgs;   
	private $form;   
	private $result;

public function __construct(){		
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}

public function getParams(){
		$this->form->x = isset($_REQUEST ['x']) ? $_REQUEST ['x'] : null;
		$this->form->y = isset($_REQUEST ['y']) ? $_REQUEST ['y'] : null;
		$this->form->op = isset($_REQUEST ['op']) ? $_REQUEST ['op'] : null;
	}

public function validate() {

		if (! (isset ( $this->form->x ) && isset ( $this->form->y ) && isset ( $this->form->op ))) {
			return false;
		}
if ($this->form->x == "") {
			$this->msgs->addError('Nie podano liczby 1');
		}
		if ($this->form->y == "") {
			$this->msgs->addError('Nie podano liczby 2');
		}
		
		
		if (! $this->msgs->isError()) {
			
			
			if (! is_numeric ( $this->form->x )) {
				$this->msgs->addError('Pierwsza wartość nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->y )) {
				$this->msgs->addError('Druga wartość nie jest liczbą całkowitą');
			}
		}
		
		return ! $this->msgs->isError();
	}
public function process(){

		$this->getparams();
		
		if ($this->validate()) {
				
			
			$this->form->x = floatval($this->form->x);
			$this->form->y = floatval($this->form->y);
			$this->msgs->addInfo('Parametry poprawne.');
			$month = 0;
			$loan = 0;
			$percent = 0;

switch ($this->form->op) {
				case '4' :
					$month = ($this->form->y)*12;
					$loan = ($this->form->x)/$month;
					$percent = ((4*$loan)/100);
					$this->result->result = $loan + $percent;
					$this->result->op_name = '4%';
					break;
				case '6' :
					$month = ($this->form->y)*12;
					$loan = ($this->form->x)/$month;
					$percent = ((6*$loan)/100);
					$this->result->result = $loan + $percent;
					$this->result->op_name = '6%';
					break;
				case '8' :
					$month = ($this->form->y)*12;
					$loan = ($this->form->x)/$month;
					$percent = ((8*$loan)/100);
					$this->result->result = $loan + $percent;
					$this->result->op_name = '8%';
					break;
				default :
					$month = ($this->form->y)*12;
					$loan = ($this->form->x)/$month;
					$percent = ((2*$loan)/100);
					$this->result->result = $loan + $percent;
					$this->result->op_name = '2%';
					break;
			}
			
			$this->msgs->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Obiektowość_zadanie5');
		$smarty->assign('page_description','Obiektowość. Funkcjonalność aplikacji zamknięta w metodach różnych obiektów. Pełen model MVC.');
		$smarty->assign('page_header','Obiekty w PHP');
				
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/CalcView.html');
	}
}
	