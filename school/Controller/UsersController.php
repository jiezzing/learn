<?php

    class UsersController extends AppController{

        public $uses = array(
            'User',
            'UserType'
        );

        public $page = null;
        public $userId = null;
        public $schoolId = null;
        public $dir = null;

        public function beforeFilter() {
            parent::beforeFilter();

            $this->page = 'Users';
            $this->userId = $this->Auth->user('id');
            $this->schoolId = $this->Auth->user('school_id');
            $this->dir = '/UNIV-' . $this->schoolId . '/';
        }

        public function index(){
            if(!$this->Auth->loggedIn()) {
                return $this->redirect($this->Auth->loginAction);
            }
            
        	$users = $this->User->fetchUsers($this->schoolId);
        	
            $this->set('page', $this->page);
            $this->set('user', $users);
        }

        public function register() {
        	$types = $this->UserType->fetchUserTypes();
            $page = 'User Registration';

            $this->set('page', 'Users');
            $this->set('types', $types);
        }

        public function create() {
        	$this->autoRender = false;

        	if ($this->request->is('ajax')) {
    			$isEmailExist = $this->isEmailExist($this->request->data['email']);

    			if ($isEmailExist) {
                    $message = Output::message('emailExist');
                    $response = Output::error($message);
    			}
    			else {
                    $register = $this->User->registration(
                        $this->request->data['type'],
                        $this->schoolId,
                        $this->request->data['firstname'],
                        $this->request->data['lastname'],
                        $this->request->data['email'],
                        AuthComponent::password('default')
                    );

        			if($register) {
                        $message = Output::message('message');
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

        public function edit($id) {
            $profile = $this->User->profile($id);
            
            $this->set('page', 'Edit Profile');
            $this->set('profile', $profile);
        }

        public function profile($id) {
            $profile = $this->User->profile($id);
            
            $this->set('page', 'User Information');
            $this->set('profile', $profile);
        }

        public function update() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $firstname = $this->request->data['firstname'];
                $lastname = $this->request->data['lastname'];
                $middleInitial = $this->request->data['middleInitial'];
                $address = $this->request->data['address'];
                $age = $this->request->data['age'];
                $about = $this->request->data['about'];
                $birthdate = $this->request->data['birthdate'];

                empty($middleInitial) ? 
                    $middleInitial = NULL :  
                    $middleInitial = $middleInitial;

                empty($address) ? 
                    $address = NULL :  
                    $address = $address;

                empty($age) ? 
                    $age = NULL :  
                    $age = $age;

                empty($about) ? 
                    $about = NULL :  
                    $about = $about;

                empty($birthdate) ? 
                    $birthdate = NULL :  
                    $birthdate = date('Y-m-d', strtotime($birthdate));

                if(array_key_exists('password', $this->request->data)) {
                    $password = AuthComponent::password($this->request->data['password']);
                    $this->User->updatePassword($this->userId, $password);
                }

                if(isset($_FILES['file']['name'])) {
                    $filepath = $_SERVER['DOCUMENT_ROOT'] . '/learn/school/webroot/files'. $this->dir . $_FILES['file']['name'];
                    $image = array(
                        'name' => $_FILES['file']['name'],
                        'size' => $_FILES['file']['size']
                    );
                    $profileImage = $this->User->updateProfileImage($this->userId, json_encode($image));

                    if(move_uploaded_file($_FILES['file']['tmp_name'], $filepath) && $profileImage){
                        $result = $this->User->updateProfile(
                            $this->userId,
                            $firstname,
                            $lastname,
                            strtoupper($middleInitial),
                            $address,
                            $age,
                            $about,
                            $birthdate
                        );
                    }
                    else{
                        $message = Output::message('failUpload');
                        $response = Output::error($message);
                    }
                }
                else {
                    $result = $this->User->updateProfile(
                        $this->userId,
                        $firstname,
                        $lastname,
                        strtoupper($middleInitial),
                        $address,
                        $age,
                        $about,
                        $birthdate
                    );
                }

                if($result) {
                    $message = Output::message('message');
                    $response = Output::success($message);
                }
                else {
                    $message = Output::message('error');
                    $response = Output::error($message);
                }
            }

            return Output::response($response);
        }

        public function findPassword() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $email = $this->request->data['email'];
                $password = AuthComponent::password($this->request->data['password']);

                $result = $this->User->findByEmailAndPassword($email, $password);

                if($result) {
                    $message = Output::message('verifyPassword');
                    $response = Output::success($message);
                }
                else {
                    $message = Output::message('errorLogin');
                    $response = Output::error($message);
                }
            }

            return Output::response($response);
        }

        public function isEmailExist($email) {
            $conditions = array(
                'User.email' => $email
            );

            $result = $this->User->hasAny($conditions);
            
            return $result;
        }
        
    }
