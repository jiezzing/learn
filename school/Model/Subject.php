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

        public function createSubject($schoolId, $name, $levels) {
        	$this->create();

            $data['school_id'] = $schoolId;
            $data['name'] = $name;
            $data['access_level'] = $levels;
            $data['status_id'] = 2;

            $this->set($data);

            $result = $this->save();

            return $result;
        }

        public function subjectExist($schoolId, $name) {
            $condition = array(
                'Subject.school_id' => $schoolId,
                'Subject.name' => $name
            );

            $result = $this->hasAny($condition);

            return $result;
        }

    }