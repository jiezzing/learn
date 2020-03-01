<?php

    class RegistrationController extends AppController{

        public $page = null;

        public function beforeFilter() {
            $this->page = 'Registration';

            if(empty($this->Session->read('logged_in'))){
                $this->redirect(array(
                    'controller' => 'login',
                    'action' => 'index'
                ));
            }
        }

        public function index(){
        	$data = array(
                'page' => $this->page
            );
            
            $this->set('data', $data);
        }
        
    }

?>
