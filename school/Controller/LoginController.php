<?php

    App::uses('AuthComponent', 'Controller/Component');

    class LoginController extends AppController{

        public $uses = array(
            'User',
            'Output'
        );

        public function beforeFilter() {
            parent::beforeFilter();

            $this->Auth->allow(array('login'));
        }

        public function login(){
            $this->autoRender = false;

            if($this->request->is('post')){
                $email = $this->request->data['email'];
                $password = $this->request->data['password'];

                $result = $this->User->findByEmail($email);

                if(!empty($result) && $result['User']['password'] == AuthComponent::password($password)) {
                    $this->Auth->login($result);
                    
                    $message = Output::message('successLogin');
                    $response = Output::success($message);
                }
                else {
                    $message = Output::message('errorLogin');
                    $response = Output::error($message);
                }
            }

            return Output::response($response);
        }

        public function index(){
            $this->render('index');
        }

        public function logout() {
            $this->Session->destroy();
            $this->redirect(array(
                'controller' => 'login',
                'action' => 'index'
            ));
        }
    }

