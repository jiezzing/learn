<?php

    App::uses('AuthComponent', 'Controller/Component');

    class RegistrationController extends AppController{

        public $uses = array(
            'University',
            'User',
            'Validator'
        );

        public $page = null;
        public $typeId = null;

        public function beforeFilter() {
            $this->page = 'Registration';
            $this->typeId = 2;
        }

        public function index(){
            $universities = $this->University->find('all', array(
                'fields' => array('id', 'name')
            ));

        	$data = array(
                'page' => $this->page,
                'universities' => $universities
            );
            
            $this->set('data', $data);
        }

        public function register(){
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $this->User->create();

                $isEmailExist = $this->Validator->checkEmail($this->request->data['email']);

                if($isEmailExist) {
                    $status = 0;
                    $message = 'Email already exist!';
                }
                else {
                    $data = array(
                        'user_type' => $this->typeId,
                        'univ_id' => $this->request->data['university'],
                        'firstname' => $this->request->data['firstname'],
                        'lastname' => $this->request->data['lastname'],
                        'email' => $this->request->data['email'],
                        'password' => AuthComponent::password($this->request->data['password']),
                        'status_id' => 1,
                    );

                    $this->User->set($data);

                    if ($this->User->save()) {
                        $status = 1;
                        $message = 'Account successfully created.';
                    }
                    else {
                        $status = 0;
                        $message = 'Registration failed, please try again.';
                    }
                }

                return $this->response($status, $message);
            }
        }

        private function response($status, $message) {
            $result = array(
                'status' => $status,
                'message' => $message
            );

            echo json_encode($result);
        }
        
    }

?>
