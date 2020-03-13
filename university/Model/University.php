<?php

    App::uses('AppModel', 'Model');

    class University extends AppModel {

        public $usesTable = 'universities';

        public function fetchUniversities() {
        	$result = $this->find('all', array(
                'fields' => array(
                	'University.id', 
                	'University.name'
                )
            ));

            return $result;
        }

    }