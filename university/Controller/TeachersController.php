<?php

    class TeachersController extends AppController{

        public function index(){
        	$page = 'Teachers';
        	
            $this->set(array('page' => $page));
        }
        
    }

?>
