<?php

    class LoginController extends AppController{

        public $uses = array(
            'User'
        );

        public function beforeFilter() {
            parent::beforeFilter();

            $this->Auth->allow('login');
        }

        public function login() {
            $this->autoRender = false;

            if($this->request->is('post')){
                $userType = 3;

                $result = $this->User->useEmailAndPassword(
                    $this->request->data['email'], 
                    AuthComponent::password($this->request->data['password']),
                    $userType
                );

                if($result) {
                    $this->Auth->login($result['User']);
                    
                    $message = Output::message('successLogin');
                    $redirect = $this->Auth->loginRedirect;
                    $response = Output::success($message);
                }
                else {
                    $message = Output::message('errorLogin');
                    $response = Output::error($message);
                }
            }

            return Output::response($response);
        }

        public function index() {
            if($this->Auth->loggedIn()) {
                return $this->redirect($this->Auth->loginRedirect);
            }
            
            $this->render('index');
        }

        public function logout() {
            $this->Auth->logout();

            return $this->redirect($this->Auth->logoutRedirect);
        }
        
    }

