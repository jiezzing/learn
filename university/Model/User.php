<?php

    App::uses('AppModel', 'Model');

    class User extends AppModel {

        public $usesTable = 'user';

        public function fetchUsers(){
        	$users = $this->find('all', array(
        		'joins' => array(
        			array(
        				'alias' => 'UserType',
        				'table' => 'user_types',
        				'type' => 'LEFT',
        				'conditions' => array(
        					'UserType.id = User.user_type'
        				)
        			)
        		),
				'fields' => array(
					'User.firstname',
					'User.lastname',
					'User.middle_initial',
					'User.email',
					'User.password',
					'User.status_id',
					'UserType.type'
				)

        	));

        	return $users;
        }

        public function profile($id){
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
                        'alias' => 'University',
                        'table' => 'universities',
                        'type' => 'INNER',
                        'conditions' => array(
                            'University.id = User.univ_id'
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
                    'UserType.type',
                    'University.name'
                )

            ));

            return $profile;
        }

        public function tally($id){
            $univId = $this->find('first', array(
                'conditions' => array('User.id' => $id),
                'fields' => array('User.univ_id')
            ));

            $admin = $this->find('count', array(
                'conditions' => array(
                    'User.univ_id' => $univId['User']['univ_id'],
                    'User.user_type' => 2
                )
            ));

            $teachers = $this->find('count', array(
                'conditions' => array(
                    'User.univ_id' => $univId['User']['univ_id'],
                    'User.user_type' => 3
                )
            ));

            $students = $this->find('count', array(
                'conditions' => array(
                    'User.univ_id' => $univId['User']['univ_id'],
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

    }