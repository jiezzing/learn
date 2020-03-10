<?php

    App::uses('AuthComponent', 'Controller/Component');

    class LoginController extends AppController{

        public $uses = array(
            'User'
        );

        public function beforeFilter() {
            parent::beforeFilter();
        }

        public function afterFilter() {
            parent::afterFilter();
        }

        public function login(){
            $this->autoRender = false;

            if($this->request->is('ajax')){
                $condition = array(
                    'conditions' => array(
                        'User.email' => $this->request->data['email'],
                        'User.password' => AuthComponent::password($this->request->data['password'])
                    ),
                    'fields' => array(
                        'User.id',
                        'User.user_type',
                        'User.firstname'
                    )
                );

                $data = $this->User->find('first', $condition);

                if($data){
                    $status = 1;
                    $type = $data['User']['user_type'];
                    $message = 'Welcome, ' . $data['User']['firstname'] . '!';
                    $id = $data['User']['id'];

                    $this->session($id, true);
                }
                else{
                    $status = 0;
                    $type = null;
                    $message = 'Invalid email or password, please try again.';
                }
            }

            return $this->output($status, $type, $message);
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

        public function session($id, $logged_in) {
            $this->Session->write(array(
                'user_id' => $id,
                'logged_in' => $logged_in
            ));
        }
    }

?>
