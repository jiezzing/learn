<?php

    class ProfileController extends AppController{

        public function index(){
        	$page = 'Profile';
        	
            $this->set(array('page' => $page));
        }
        
    }

?>
