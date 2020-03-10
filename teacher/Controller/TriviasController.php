<?php

    class TriviasController extends AppController{

        public $page = null;

        public function beforeFilter() {
            parent::beforeFilter();
            $this->page = 'Trivia';
        }

        public function index(){
        	$data = array(
        		'page' => $this->page
        	);
        	
            $this->set('data', $data);
        }
        
    }

?>
