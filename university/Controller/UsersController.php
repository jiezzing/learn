<?php

    App::uses('AuthComponent', 'Controller/Component');

    class UsersController extends AppController{

        public $page = null;

        public function beforeFilter() {
            $this->page = 'Users';

            if(empty($this->Session->read('logged_in'))){
                $this->redirect(array(
                    'controller' => 'login',
                    'action' => 'index'
                ));
            }
        }

    	public $uses = array(
    		'User',
    		'UserType'
    	);

        public function index(){
        	$users = $this->User->fetchUsers();

        	$data = array(
        		'page' => $this->page,
        		'users' => $users
        	);
        	
            $this->set('data', $data);
        }

        // register new user
        public function register() {
        	$types = $this->UserType->fetchUserTypes();

        	$data = array(
                'page' => $this->page,
                'types' => $types
            );

            $this->set('data', $data);
        }

        // create user
        public function create() {
        	$this->autoRender = false;

        	if ($this->request->is('ajax')) {
        		$checkFields = $this->emptyFieldsChecker($_POST); 

        		if ($checkFields) {
        			return $this->output(1, 'Some fiels are missing.');
        		}
        		else {
        			$isEmailExist = $this->isEmailExist($this->request->data['email']);

        			if ($isEmailExist) {
        				return $this->output(1, 'Email already used by other user.');
        			}
        			else {
	        			$this->User->create();

	        			$data = array(
	        				'user_type' => $this->request->data['types'],
	        				'firstname' => $this->request->data['firstname'],
	        				'lastname' => $this->request->data['lastname'],
	        				'middle_initial' => strtoupper($this->request->data['middle-initial']),
	        				'email' => $this->request->data['email'],
	        				'password' => AuthComponent::password('default'),
	        				'status_id' => 1,
	        			);

	        			$this->User->set($data);

	        			if ($this->User->save()) {
	        				return $this->output(2, 'New user has been successfully added.');
	        			}
	        			else {
	        				return $this->output(1, 'An error occured, please try again.');
	        			}
        			}
        		}
        	}
        }

        // validate fields if empty
        private function emptyFieldsChecker($data = array()) {
        	foreach ($data as $key => $value) {
        		if (empty($value)) {
        			return true;
        		}
        	}
        }

        // checks email
        private function isEmailExist($email) {
        	$condition = array('email' => $email);
        	$result =  $this->User->hasAny($condition);

        	return $result;
        }

        // display
        private function output($status, $message) {
        	$result = array(
        		'status' => $status,
        		'message' => $message
        	);

        	echo json_encode($result);
        }
        
    }
