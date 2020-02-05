<?php

    class UsersController extends AppController{

        public function beforeFilter(){
            $this->Auth->allow([
            	'register'
            ]);
        }

        public function register(){
            if($this->request->is('ajax')){
                $email = array('User.email' => $this->request->data['email']);
                $this->request->data['User']['user_type'] = 3;
                $this->request->data['User']['email'] = $this->request->data['email'];
                $this->request->data['User']['password'] = AuthComponent::password($this->request->data['password']);
                $this->request->data['User']['name'] = $this->request->data['name'];
                $this->request->data['User']['status_id'] = 2;

                $this->User->set($this->request->data);

                if($this->User->hasAny($email)){
                    echo 2;
                }
                else{
                    if($this->User->save()){
                        echo 1;
                    }
                    else{
                        echo 0;
                    }
                }
                $this->render(false);
            }
        }

        public function login(){
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
                    echo $data['User']['user_type'];
                    $this->Session->write('user_id', $data['User']['id']);
                }
                else{
                    echo 0;
                }
                $this->render(false);
            }
        }

        public function index(){

        }

        public function logout() {
            $this->redirect($this->Auth->logout());
        }
    }

?>
