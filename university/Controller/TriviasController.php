<?php

    class TriviasController extends AppController{

        public function index(){
        	$data = array(
        		'page' => 'Trivia'
        	);
        	
            $this->set('data', $data);
        }
        
    }

?>
