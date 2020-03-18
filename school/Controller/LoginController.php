<?php

    App::uses('AuthComponent', 'Controller/Component');

    class LoginController extends AppController{

        public $uses = array(
            'User',
            'Output'
        );

        public function beforeFilter() {
            parent::beforeFilter();
        }

        public function afterFilter() {
            parent::afterFilter();

            if(!empty($this->Session->read('logged_in'))){
                return $this->redirect(array(
                    'controller' => 'home',
                    'action' => 'index'
                ));
            }
        }

        public function login(){
            $this->autoRender = false;

            if($this->request->is('ajax')){
                $email = $this->request->data['email'];
                $password = AuthComponent::password($this->request->data['password']);

                $result = $this->User->login($email, $password);

                if($result){
                    $message = $this->Output->message('successLogin');
                    $response = $this->Output->success($message);

                    $this->Session->write('user_id', $result['User']['id']);
                    $this->Session->write('school_id', $result['User']['school_id']);
                    $this->Session->write('logged_in', true);
                }
                else{
                    $message = $this->Output->message('errorLogin');
                    $response = $this->Output->error($message);
                }
            }

            return $this->Output->response($response);
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

