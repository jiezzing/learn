<?php

    class UsersController extends AppController{

        public function index(){
        	$query = $this->User->query('
        		SELECT * FROM user_types
        		WHERE id != 1
    		');

        	$data = array(
        		'page' => 'User Registration',
        		'types' => $query
        	);
        	
            $this->set('data', $data);
        }
        
    }

?>
