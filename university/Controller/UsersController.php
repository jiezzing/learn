<?php

    App::uses('AuthComponent', 'Controller/Component');

    class UsersController extends AppController{

        public function beforeFilter() {
            parent::beforeFilter();
        }

    	public $uses = array(
    		'User',
    		'UserType',
            'Validator'
    	);

        public function index(){
        	$users = $this->User->fetchUsers();

        	$data = array(
        		'page' => 'Users',
        		'users' => $users
        	);
        	
            $this->set('data', $data);
        }

        // register new user
        public function register() {
        	$types = $this->UserType->fetchUserTypes();

        	$data = array(
                'page' => 'Users',
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

        public function edit($id) {
            $profile = $this->User->profile($id);

            $data = array(
                'page' => 'Edit Profile',
                'profile' => $profile
            );
            
            $this->set('data', $data);
        }

        public function update() {
            if($this->request->is('ajax')) {
                $this->autoRender = false;
                $isEmailExist = $this->User->emailExist(
                    $this->Session->read('user_id'),
                    $this->request->data['email']
                );

                if($isEmailExist) {
                    $status = 0;
                    $message = 'Email already exist!';
                }
                else {

                    empty($middle_initial) ? 
                        $middle_initial = NULL :  
                        $middle_initial = $this->request->data['middle_initial'];

                    empty($address) ? 
                        $address = NULL :  
                        $address = $this->request->data['address'];

                    isset($age) ? 
                        $age = NULL :  
                        $age = $this->request->data['age'];

                    isset($about) ? 
                        $about = NULL :  
                        $about = $this->request->data['about'];

                    isset($birthdate) ? 
                        $birthdate = NULL :  
                        $birthdate = $this->request->data['birthdate'];

                    if(empty($_FILES['file']['name'])) {
                        $update = $this->User->updateProfile(
                            $this->Session->read('user_id'),
                            $this->request->data['firstname'],
                            $this->request->data['lastname'],
                            $middle_initial,
                            $address,
                            $age,
                            $about,
                            $birthdate,
                            $this->request->data['email'],
                            NULL
                        );
                    }
                    else {
                        $filepath = $_SERVER['DOCUMENT_ROOT'] . '/learn/university/webroot/img/' . $_FILES['file']['name'];
                        $image = array(
                            'name' => $_FILES['file']['name'],
                            'size' => $_FILES['file']['size']
                        );

                        if(move_uploaded_file($_FILES['file']['tmp_name'], $filepath)){
                            $update = $this->User->updateProfile(
                                $this->Session->read('user_id'),
                                $this->request->data['firstname'],
                                $this->request->data['lastname'],
                                $this->request->data['middle_initial'],
                                $address,
                                $age,
                                $about,
                                $birthdate,
                                $this->request->data['email'],
                                json_encode($image)
                            );
                        }
                        else{
                            $status = 0;
                            $message = 'Unable to upload file, please try again.';
                        }
                    }

                    if($update) {
                        $status = 1;
                        $message = 'Account successfully updated.';
                    }
                    else {
                        $status = 0;
                        $message = 'An error occured, please try again.';
                    }
                }

                return $this->output($status, $message);
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
