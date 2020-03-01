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
                $condition = array(
                    'conditions' => array(
                        'User.email' => $this->request->data['email'],
                        'User.password' => AuthComponent::password($this->request->data['password'])
                    ),
                    'fields' => array(
                        'User.id',
                        'User.user_type'
                    )
                );

                $data = $this->User->find('first', $condition);

                if($data){
                    $this->session($data['User']['id'], true);
                    // $this->output($data['User']['user_type']);
                    echo $data['User']['user_type'];

                }
                else{
                    $this->output(0);
                }
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

        private function output($type) {
            $result = array(
                'type' => $type
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
