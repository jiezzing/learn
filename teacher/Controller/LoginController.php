<?php

    class LoginController extends AppController{

        public $uses = array(
            'User'
        );

        public function beforeFilter() {
            parent::beforeFilter();

            $this->Auth->allow(array(
                'login',
                'index'
            ));
        }

        public function login(){
            $this->autoRender = false;

            if($this->request->is('post')){
                $email = $this->request->data['email'];
                $password = AuthComponent::password($this->request->data['password']);
                $userType = 3;

                $result = $this->User->useEmailAndPassword($email, $password, $userType);

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

