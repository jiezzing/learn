<?php

    App::uses('AuthComponent', 'Controller/Component');

    class LoginController extends AppController{

        public $uses = array(
            'User',
            'Common'
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
                $result = $this->User->find('first', array(
                    'conditions' => array(
                        'User.email' => $this->request->data['email'],
                        'User.password' => AuthComponent::password($this->request->data['password'])
                    ),
                    'fields' => array(
                        'User.id',
                        'User.univ_id',
                        'User.user_type',
                        'User.firstname'
                    )
                ));

                if($result){
                    $response = array(
                        'status' => 1,
                        'type' => $result['User']['user_type'],
                        'message' => 'Welcome, ' . $result['User']['firstname'] . '!'
                    );

                    $this->Session->write('user_id', $result['User']['id']);
                    $this->Session->write('logged_in', true);
                    $this->Session->write('univ_id', $result['User']['univ_id']);
                }
                else{
                    $response = array(
                        'status' => 0,
                        'type' => null,
                        'message' => 'Invalid email or password, please try again.'
                    );
                }

                return $this->Common->response($response);
            }
        }

        public function index(){
            $data = array(
                'page' => 'Login'
            );
            
            $this->set('data', $data);
        }

        public function logout() {
            $this->Session->destroy();
            $this->redirect(array(
                'controller' => 'login',
                'action' => 'index'
            ));
        }

        private function output($status = 0, $type = null, $message = '') {
            $result = array(
                'status' => $status,
                'type' => $type,
                'message' => $message
            );

            echo json_encode($result);
        }
    }

?>
