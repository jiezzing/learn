<?php

    class ProfileController extends AppController{

        public function index(){
        	$data = array(
                'page' => 'User'
            );
            
            $this->set('data', $data);
        }
        
    }

?>
