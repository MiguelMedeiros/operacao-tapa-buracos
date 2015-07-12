<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
	
	public $components = array(
	    'Session',
	    'Auth' => array(
	        'loginRedirect' => array('controller' => 'pages', 'action' => 'home'),
	        'logoutRedirect' => array('controller' => 'pages', 'action' => 'home'),
	        //'authorize' => array('Controller') // Added this line
	    ),
	    'Email'
	);
		
	public function beforeRender(){
		
	}
	
    public function beforeFilter() {
        	
        $this->Auth->allow('markers', 'salvar');
        $this->Auth->allow('markers', 'buscar');
        $this->Auth->allow('pages', 'home');
		
		$this->set('logado' , $this->Auth->loggedIn());
		$this->set('usuario', $this->Auth->user());
		//var_dump($this->Auth->user());exit;    	
    }
	
	public function formatarData($dateString) {
        $date = date_create($dateString);
		return date_format($date, 'd/m/Y - H:i');
    }
	
	function afterFilter() {
	    if ($this->response->statusCode() == '404')
	    {
	        $this->redirect(array(
	            'controller' => 'pages',
	            'action' => 'home')
	        );
	    }
	}
}
