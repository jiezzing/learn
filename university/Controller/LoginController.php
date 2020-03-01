<?php

    App::uses('User', 'Model');
    App::uses('AuthComponent', 'Controller/Component');

    class LoginController extends AppController{

        public function beforeFilter() {
            parent::beforeFilter();
            
            // $this->Auth->allow('index');
        }

        public function login(){
            $this->autoRender = false;
            if($this->request->is('ajax')){
                $user = new User();
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

                $data = $user->find('first', $condition);

                if($data){
                    $this->Session->write('user_id', $data['User']['id']);
                    $this->Session->write('logged_in', true);
                    echo $data['User']['user_type'];
                }
                else{
                    echo AuthComponent::password($this->request->data['password']);
                }
                $this->render(false);
            }
        }

        public function index(){
            $data = array(
                'page' => 'Login'
            );
            
            $this->set('data', $data);
        }

        public function logout() {
            $this->redirect('/login');
        }
    }

?>
