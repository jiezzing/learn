<?php

    class UsersController extends AppController{

        public function beforeFilter(){
            $this->Auth->allow([
            	'register'
            ]);
        }

        public function register(){
            $this->render('register');
        }

        public function login(){

        }
    }

?>
