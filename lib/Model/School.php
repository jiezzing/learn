<?php

    App::uses('AppModel', 'Model');

    class School extends AppModel {

        public $usesTable = 'schools';

        public function fetchSchools() {
        	$result = $this->find('all', array(
                'fields' => array(
                	'School.id', 
                	'School.name'
                )
            ));

            return $result;
        }

    }