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

    }