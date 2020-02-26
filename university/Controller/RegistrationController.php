<?php

    class RegistrationController extends AppController{

        public function index(){
        	$data = array(
                'page' => 'Registration'
            );
            
            $this->set('data', $data);
        }
        
    }

?>
