<?php

    App::uses('AuthComponent', 'Controller/Component');
    App::uses('Folder', 'Utility');

    class RegistrationController extends AppController{

        public $uses = array(
            'School',
            'User',
            'Output'
        );

        public function beforeFilter() {
            parent::beforeFilter();
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
                $isEmailExist = $this->Output->checkEmail($email);
                $folder = new Folder();
                $dir = WWW_ROOT . 'files/UNIV-' . $school;

                if($isEmailExist) {
                    $message = $this->Output->message('emailExist');
                    $response = $this->Output->error($message);
                }
                else {
                    $result = $this->User->registration($school, $firstname, $lastname, $email, $password);

                    if($result) {
                        if(!$folder->inPath($dir)) {
                            $folder->create($dir); 
                        }

                        $message = $this->Output->message('registered');
                        $response = $this->Output->success($message);
                    }
                    else {
                        $message = $this->Output->message('error');
                        $response = $this->Output->error($message);
                    }
                }
            }

            return $this->Output->response($response);
        }
        
    }

