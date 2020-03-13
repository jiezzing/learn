<?php

    App::uses('AuthComponent', 'Controller/Component');
    App::uses('Folder', 'Utility');

    class RegistrationController extends AppController{

        public $uses = array(
            'University',
            'User',
            'Common'
        );

        public $typeId = null;

        public function beforeFilter() {
            parent::beforeFilter();
        }

        public function index() {
            $universities = $this->University->fetchUniversities();

            $this->set('university', $universities);
        }

        public function register() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $isEmailExist = $this->Common->checkEmail($this->request->data['email']);

                if($isEmailExist) {
                    $status = 0;
                    $message = 'Email already exist!';
                }
                else {
                    $folder = new Folder();
                    $userType = 2;
                    $status = 1;
                    $dir = WWW_ROOT . 'files/UNIV-' . $univId;

                    $result = $this->User->registration(
                        $userType, 
                        $this->request->data['university'], 
                        $this->request->data['firstname'], 
                        $this->request->data['lastname'], 
                        $this->request->data['email'], 
                        AuthComponent::password($this->request->data['password']), 
                        $status
                    );

                    if($result) {
                        if(!$folder->inPath($dir)) {
                            $folder->create($dir); 
                        }
                            
                        $response = array(
                            'status' => 1,
                            'message' => 'Account has been successfully created.',
                            'type' => 'Success'
                        );
                    }
                    else {
                        $response = array(
                            'status' => 0,
                            'message' => 'An error occured upon processing your request. Please try again.',
                            'type' => 'Error'
                        );
                    }
                }
            }

            return $this->Common->response($response);
        }
        
    }

