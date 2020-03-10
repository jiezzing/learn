<?php

    App::uses('AppModel', 'Model');

    class UserType extends AppModel {

        public $usesTable = 'user_types';

        public function fetchUserTypes() {
        	$types = $this->find('all', array(
        		'conditions' => array('id !=' => 1)
        	));

        	return $types;
        }

    }