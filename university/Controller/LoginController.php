<?php

    App::uses('User', 'Model');
    App::uses('AuthComponent', 'Controller/Component');

    class LoginController extends AppController{

        public function login(){
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
                    echo $data['User']['user_type'];
                }
                else{
                    echo AuthComponent::password($this->request->data['password']);
                }
                $this->render(false);
            }
        }

        public function index(){
            $page = 'Login';
            
            $this->set(array('page' => $page));
        }

        public function logout() {
            $this->redirect('/login');
        }
    }

?>
