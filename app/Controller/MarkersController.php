<?php

App::uses('AppController', 'Controller');

class MarkersController extends AppController {

	public $uses = array("Marker");
	
 	public function salvar(){
 		$this->autoRender = false;
        
		if(isset($this->data['latlang']) && 
			$this->data['latlang'] != "" &&
			isset($this->data['email']) &&
			$this->data['email'] != ""){
				
				if(filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)){
					
					$posicao = explode(",", $this->data['latlang']);
					$data['lat'] = $posicao[0]; 
					$data['lng'] = $posicao[1];
					$data['email'] = $this->data['email'];
					
					if ($this->Marker->save($data)) {
			            return "Alerta enviado com sucesso!<br/>Muito obrigado por tomar conta da cidade! :D<br/>Você receberá um e-mail assim que o alerta for alterado!";
			        }else{
		        	 	return "Alerta não foi salvo!";
			        }
					
				}else{
	        	 	return "E-mail Inválido, o alerta não foi salvo!";
				}
				
		}else{
    	 	return "Alerta não foi salvo!";
		}
		
 	}
	
	public function buscar(){
 		$this->autoRender = false;
		
		$dom = new DOMDocument("1.0");
		$node = $dom->createElement("markers");
		$parnode = $dom->appendChild($node); 
		
		if(!$this->Auth->loggedIn()){
			$conditions = array('conditions' => array('status !=' => '1'));
		}
		
		if(isset($this->data['status']) && $this->data['status'] != ""){
			if($this->data['status'] == "-1"){
				if(!$this->Auth->loggedIn()){
					$conditions = array('conditions' => array('status !=' => '1'));
				}
			}else{
				$conditions = array('conditions' => array('status' => $this->data['status']));				
			}
		}
		
		$results = $this->Marker->find("all", $conditions);
		
		if (!$results) {  
		    exit();
		} 
		
		header("Content-type: text/xml"); 
		
		foreach($results as $result){
		  $node = $dom->createElement("marker");  
		  $newnode = $parnode->appendChild($node);     
		  $newnode->setAttribute("id", $result['Marker']['id']);  
		  $newnode->setAttribute("lat", $result['Marker']['lat']);  
		  $newnode->setAttribute("lng", $result['Marker']['lng']);   
		  $newnode->setAttribute("status", $result['Marker']['status']);
		  $newnode->setAttribute("created", $this->formatarData($result['Marker']['created']));
		  $newnode->setAttribute("modified", $this->formatarData($result['Marker']['modified']));
		  
		}
		
		return $dom->saveXML();
	}	
	
	public function atualizar(){
 		$this->autoRender = false;
        
		if(isset($this->data['id']) && 
			$this->data['id'] != "" &&
			isset($this->data['status']) &&
			$this->data['status'] != ""){
				$data['id'] = $this->data['id'];
				$data['status'] = $this->data['status'];
				
				if ($this->Marker->save($data)) {
					
					$conditions = array('conditions' => array('Marker.id' => $this->data['id']));
					$marcador = $this->Marker->find('first', $conditions);
						
					$this->Email->sendAs = 'html';
					$this->Email->from = 'no-reply@operacaotapaburacos.com.br';
					$this->Email->to = $marcador['Marker']['email'];
					
					if($data['status'] == 1){
						$this->Email->template = 'spam';
						$this->Email->subject = '[Operação Tapa-Buracos Curitiba] Buraco Inexistente';
						$this->Email->send();
						
						return "Buraco inexistente!";	
											
					}elseif($data['status'] == 2){
						
						$this->Email->template = 'sucesso';
						$this->Email->subject = '[Operação Tapa-Buracos Curitiba] Buraco Tapado';
						$this->Email->send();
						
						return "Buraco Tapado!";
					}else{
						return "Alerta de Buraco!";
					}
		            
		        }else{
	        	 	return "Falha na hora de salvar!";
		        }
					
		}else{
    	 	return "Falha na hora de salvar!";
		}
		
 	}
	
}

