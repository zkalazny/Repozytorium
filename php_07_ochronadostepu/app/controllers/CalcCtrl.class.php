<?php

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;


class CalcCtrl {

	private $form;  
	private $result; 

	public function __construct(){
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	public function getParams(){
		$this->form->x = getFromRequest('x');
		$this->form->y = getFromRequest('y');
		$this->form->op = getFromRequest('op');
	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		if (! (isset ( $this->form->x ) && isset ( $this->form->y ) && isset ( $this->form->op ))) {
			return false;
		}
		
		if ($this->form->x == "") {
			getMessages()->addError('Nie podano kwoty');
		}
		if ($this->form->y == "") {
			getMessages()->addError('Nie podano ilości lat');
		}
		if ($this->form->x <= 0) {
			getMessages()->addError('Kwota niepoprawna');
		}
		if ($this->form->y <= 0) {
			getMessages()->addError('Ilość lat niepoprawna');
		}
		
		if (! getMessages()->isError()) {
			
			if (! is_numeric ( $this->form->x )) {
				getMessages()->addError('Pierwsza wartość nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->y )) {
				getMessages()->addError('Druga wartość nie jest liczbą całkowitą');
			}
		}
		
		return ! getMessages()->isError();
	}
	
	public function action_calcCompute(){

		$this->getParams();
		
		if ($this->validate()) {
				
			$this->form->x = floatval($this->form->x);
			$this->form->y = floatval($this->form->y);
			getMessages()->addInfo('Przekazane parametry są poprawne');
				
			switch ($this->form->op) {
				case '5' :
					if (inRole('admin')) {
						$month = $this->form->y * 12;
						$loan = $this->form->x/$month;
						$percent = ($this->form->op*$loan)/100;
						$this->result->result = $loan + $percent;
						$this->result->op_name = '5%';
					} else {
						getMessages()->addError('Tylko administrator może wykonać tę operację');
					}
					break;
				case '10' :
						$month = $this->form->y * 12;
						$loan = $this->form->x/$month;
						$percent = ($this->form->op*$loan)/100;
						$this->result->result = $loan + $percent;
						$this->result->op_name = '10%';
					break;
				case '15' :
					if (inRole('admin')) {
						$month = $this->form->y * 12;
						$loan = $this->form->x/$month;
						$percent = ($this->form->op*$loan)/100;
						$this->result->result = $loan + $percent;
						$this->result->op_name = '15%';
					} else {
						getMessages()->addError('Tylko administrator może wykonać tę operację');
					}
					break;
				default :
						$month = $this->form->y * 12;
						$loan = $this->form->x/$month;
						$percent = ($this->form->op*$loan)/100;
						$this->result->result = $loan + $percent;
						$this->result->op_name = '20%';
					break;
			}
			
			getMessages()->addInfo('Obliczenia zostały wykonane');
		}
		
		$this->generateView();
	}
	
	public function action_calcShow(){
		getMessages()->addInfo('Oto najnowszy kalkulator kredytowy');
		$this->generateView();
	}
	
	public function generateView(){

		getSmarty()->assign('user',unserialize($_SESSION['user']));
				
		getSmarty()->assign('page_title','Kalkulator kredytowy - role');

		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.tpl');
	}
}