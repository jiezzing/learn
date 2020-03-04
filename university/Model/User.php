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
                    )
                ),
                'conditions' => array(
                    'User.id' => $id
                ),
                'fields' => array(
                    'User.firstname',
                    'User.lastname',
                    'User.middle_initial',
                    'UserType.type'
                )

            ));

            return $profile;
        }

    }