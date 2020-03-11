<?php

    App::uses('AppModel', 'Model');

    class Subject extends AppModel {

        public $usesTable = 'subjects';

        public function fetchSubjects() {
            $result = $this->find('all', array(
            	'fields' => array(
            		'Subject.id',
            		'Subject.name',
            		'Subject.access_level'
            	)
            ));

            return $result;
        }

        public function createSubject($id, $name, $levels, $status) {
        	$this->create();

            $data = array(
                'univ_id' => $id,
                'name' => $name,
                'access_level' => $levels,
                'status_id' => $status
            );

            $this->set($data);

            return $this->save();
        }

    }