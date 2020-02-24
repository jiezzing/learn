<?php

    class HomeController extends AppController{

        public function index(){
        	$data = array(
        		'page' => 'Home'
        	);
        	
            $this->set('data', $data);
        }
        
    }

?>
