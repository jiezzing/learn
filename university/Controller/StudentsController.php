<?php

    class StudentsController extends AppController{

        public function index(){
        	$page = 'Students';
        	
            $this->set(array('page' => $page));
        }
        
    }

?>
