<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public $uses = array('Marker');

 	public function home(){
 			
 		$this->layout = "padrao";
		
		$conditions = array('conditions' => array('status !=' => 1));
		$buracos_total = $this->Marker->find('count', $conditions);
		$this->set('buracos_total', $buracos_total);
		
		$conditions = array('conditions' => array('status' => 0));
		$buracos_abertos = $this->Marker->find('count', $conditions);
		$this->set('buracos_abertos', $buracos_abertos);
		
		$conditions = array('conditions' => array('status' => 2));
		$buracos_tapados = $this->Marker->find('count', $conditions);
		$this->set('buracos_tapados', $buracos_tapados);
		
 	}
	
}
