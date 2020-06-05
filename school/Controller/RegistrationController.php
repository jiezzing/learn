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
                $isEmailExist = $this->User->checkEmail($this->request->data['email']);

                if($isEmailExist) {
                    $message = Output::message('emailExist');
                    $response = Output::error($message);
                }
                else {
                    $result = $this->User->registration(
                        3,
                        $this->request->data['school'],
                        $this->request->data['firstname'],
                        $this->request->data['lastname'],
                        $this->request->data['email'],
                        AuthComponent::password($this->request->data['password'])
                    );

                    if($result) {
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

