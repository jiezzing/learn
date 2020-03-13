<?php

    App::uses('AuthComponent', 'Controller/Component');
    App::uses('Folder', 'Utility');
    App::uses('File', 'Utility');

    class RegistrationController extends AppController{

        public $uses = array(
            'University',
            'User',
            'Common'
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
                'page' => 'Registration',
                'universities' => $universities
            );

            $this->set('university', $universities);
        }

        public function register(){
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $this->User->create();

                $isEmailExist = $this->Common->checkEmail($this->request->data['email']);

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

                    $result = $this->User->save();

                    $path = WWW_ROOT . 'files/UNIV-' . $result['User']['univ_id'];
                    $folder = new Folder();
                    $folder->create($path); 

                    if ($result) {
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
