<?php

    App::uses('Folder', 'Utility');

    class RegistrationController extends AppController {

        public $uses = array(
            'School',
            'User'
        );

        public function beforeFilter() {
            parent::beforeFilter();

            $this->Auth->allow(array(
                'index', 
                'register',
                'checkEmail'
            ));
        }

        public function index() {
            $schools = $this->School->fetchSchools();

            $this->set('school', $schools);
        }

        public function register() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $school = $this->request->data['school'];
                $firstname = $this->request->data['firstname'];
                $lastname = $this->request->data['lastname'];
                $email = $this->request->data['email'];
                $password = AuthComponent::password($this->request->data['password']);
                $userType = 3;
                $folder = new Folder();
                $dir = WWW_ROOT . 'files/UNIV-' . $school;

                $isEmailExist = $this->User->checkEmail($email);

                if($isEmailExist) {
                    $message = Output::message('emailExist');
                    $response = Output::error($message);
                }
                else {
                    $result = $this->User->registration(
                        $userType, 
                        $school, 
                        $firstname, 
                        $lastname, 
                        $email, 
                        $password
                    );

                    if($result) {
                        if(!$folder->inPath($dir)) {
                            $folder->create($dir); 
                        }

                        $message = Output::message('registered');
                        $response = Output::success($message);
                    }
                    else {
                        $message = Output::message('error');
                        $response = Output::error($message);
                    }
                }
            }

            return Output::response($response);
        }
        
    }

