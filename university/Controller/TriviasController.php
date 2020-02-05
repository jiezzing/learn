<?php

    class TriviasController extends AppController{

        public function index(){
        	$page = 'Trivia';
        	
            $this->set(array('page' => $page));
        }
        
    }

?>
