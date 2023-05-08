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
			getMessages()->addError('Kwota nie została podana');
		}
		if ($this->form->op == "") {
			getMessages()->addError('Oprocentowanie nie zostało podane');
		}
		if ($this->form->y == "") {
			getMessages()->addError('Ilość lat nie została podana');
		}
		if ($this->form->x <= 0) {
			getMessages()->addError('Kwota nie może być liczbą ujemną lub równą 0');
		}
		if ($this->form->op <= 0) {
			getMessages()->addError('Oprocentowanie nie może być liczbą ujemną lub równą 0');
		}
		if ($this->form->y <= 0) {
			getMessages()->addError('Ilość lat nie może być liczbą ujemną lub równą 0');
		}
		
		
		if (! getMessages()->isError()) {
			
			
			if (! is_numeric ( $this->form->x )) {
				getMessages()->addError('Ta kwota nie jest liczbą całkowitą');
			}
			if (! is_numeric ( $this->form->op )) {
				getMessages()->addError('To oprocentowanie nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->y )) {
				getMessages()->addError('Ilość lat nie jest liczbą całkowitą');
			}
		}
		
		return ! getMessages()->isError();
	}
	
	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
				
			
			$this->form->x = floatval($this->form->x);
			$this->form->y = floatval($this->form->y);
			$this->form->op = floatval($this->form->op);
			getMessages()->addInfo('Zostały przekazane poprawne parametry');
			
			$month = $this->form->y * 12;
			$loan = $this->form->x/$month;
			$percent = ($this->form->op*$loan)/100;
			$this->result->result = $loan + $percent;			
			
			
			getMessages()->addInfo('Obliczenia zostały wykonane');
		}
		
		$this->generateView();
	}
	public function generateView(){
		
		getSmarty()->assign('page_title','Aplikacja 06');
		getSmarty()->assign('page_description','Kolejne rozszerzenia dla aplikacja z jednym "punktem wejścia". Do nowej struktury dołożono automatyczne ładowanie klas wykorzystując w strukturze przestrzenie nazw.');
		getSmarty()->assign('page_header','Kontroler główny/kalkulator kredytowy');
					
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.tpl');
	}	
}
