<?php

    class HomeController extends AppController{

        public function index(){
        	$page = 'Dashboard';
        	
            $this->set(array('page' => $page));
        }
        
    }

?>
