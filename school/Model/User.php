<?php

    App::uses('AppModel', 'Model');

    class User extends AppModel {

        public $usesTable = 'user';

        public function registration($schoolId, $firstname, $lastname, $email, $password) {
            $this->create();

            $data['user_type'] = 2;
            $data['school_id'] = $schoolId;
            $data['firstname'] = $firstname;
            $data['lastname'] = $lastname;
            $data['email'] = $email;
            $data['password'] = $password;
            $data['status_id'] = 1;

            $this->set($data);

            $result = $this->save();
            
            return $result;
        }

        public function fetchUsers($schoolId) {
        	$users = $this->find('all', array(
        		'joins' => array(
        			array(
        				'alias' => 'UserType',
        				'table' => 'user_types',
        				'type' => 'INNER',
        				'conditions' => array(
        					'UserType.id = User.user_type'
        				)
        			),
                    array(
                        'alias' => 'Status',
                        'table' => 'status',
                        'type' => 'INNER',
                        'conditions' => array(
                            'Status.id = User.status_id'
                        )
                    )
        		),
                'conditions' => array(
                    'User.school_id' => $schoolId
                ),
				'fields' => array(
                    'User.id',
					'User.firstname',
					'User.lastname',
					'User.middle_initial',
					'User.email',
					'User.password',
                    'User.about',
                    'User.gender',
                    'User.birthdate',
                    'User.address',
					'User.status_id',
					'UserType.type',
                    'Status.status'
				)

        	));

        	return $users;
        }

        public function profile($id) {
            $profile = $this->find('first', array(
                'joins' => array(
                    array(
                        'alias' => 'UserType',
                        'table' => 'user_types',
                        'type' => 'INNER',
                        'conditions' => array(
                            'UserType.id = User.user_type'
                        )
                    ),
                    array(
                        'alias' => 'School',
                        'table' => 'schools',
                        'type' => 'INNER',
                        'conditions' => array(
                            'School.id = User.school_id'
                        )
                    )
                ),
                'conditions' => array(
                    'User.id' => $id
                ),
                'fields' => array(
                    'User.firstname',
                    'User.lastname',
                    'User.middle_initial',
                    'User.gender',
                    'User.birthdate',
                    'User.address',
                    'User.age',
                    'User.email',
                    'User.about',
                    'User.image',
                    'UserType.type',
                    'School.name'
                )

            ));

            return $profile;
        }

        public function tallyUsers($schoolId) {
            $admin = $this->find('count', array(
                'conditions' => array(
                    'User.school_id' => $schoolId,
                    'User.user_type' => 2
                )
            ));

            $teachers = $this->find('count', array(
                'conditions' => array(
                    'User.school_id' => $schoolId,
                    'User.user_type' => 3
                )
            ));

            $students = $this->find('count', array(
                'conditions' => array(
                    'User.school_id' => $schoolId,
                    'User.user_type' => 4
                )
            ));

            $tally = array(
                'totalAdmin' => $admin,
                'totalTeachers' => $teachers,
                'totalStudents' => $students
            );

            return $tally;
        }

        public function updateProfile($id, $firstname, $lastname, $middle_initial, $address, $age, $about, $birthdate, $email) {
            $data['firstname'] = $firstname;
            $data['lastname'] = $lastname;
            $data['middle_initial'] = $middle_initial;
            $data['address'] = $address;
            $data['age'] = $age;
            $data['about'] = $about;
            $data['birthdate'] = $birthdate;
            $data['email'] = $email;

            $this->read(null, $id);
            $this->set($data);

            $result = $this->save();
            
            return $result;
        }

        public function updateProfileImage($id, $image) {
            $data['image'] = $image;

            $this->read(null, $id);
            $this->set($data);

            $result = $this->save();
            
            return $result;
        }

        public function updatePassword($id, $password) {
            $data['password'] = $password;

            $this->read(null, $id);
            $this->set($data);

            $result = $this->save();
            
            return $result;
        }

        public function checkEmail($email) {
            $conditions = array(
                'User.email' => $email
            );

            $result = $this->hasAny($conditions);
            
            return $result;
        }

        public function emailExist($userId, $email) {
            $conditions = array(
                'User.id !=' => $userId,
                'User.email' => $email
            );

            $result = $this->hasAny($conditions);
            
            return $result;
        }

        public function findByEmailPassword($email, $password) {
            $result = $this->find('first', array(
                'conditions' => array(
                    'User.email' => $email,
                    'User.password' => $password
                ),
                'fields' => array(
                    'User.id',
                    'User.school_id'
                )
            ));
            
            return $result;
        }

    }