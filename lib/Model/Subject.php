<?php

    App::uses('AppModel', 'Model');

    class Subject extends AppModel {

        public $usesTable = 'subjects';

        // fetch all school subjects
        public function fetchSubjects($schoolId) {
            $result = $this->find('all', array(
                'conditions' => array(
                    'Subject.school_id' => $schoolId
                ),
            	'fields' => array(
            		'Subject.id',
            		'Subject.name',
            		'Subject.access_level',
                    'Subject.created',
                    'Subject.modified'
            	)
            ));

            return $result;
        }

        // fetch all subject access level
        public function fetchSubjectAccessLevels($schoolId) {
            $result = $this->find('all', array(
                'conditions' => array(
                    'Subject.school_id' => $schoolId
                ),
                'fields' => array(
                    'Subject.access_level'
                )
            ));

            return $result;
        }

        // check if subject name already exist
        public function subjectExist($schoolId, $name) {
            $condition = array(
                'Subject.school_id' => $schoolId,
                'Subject.name' => $name
            );

            $result = $this->hasAny($condition);

            return $result;
        }

        // create new school subject
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

        // delete subject
        public function deleteSubject($id) {
            $result = $this->delete($id);
            
            return $result;
        }

        // fetch subject data
        public function fetchSubjectData($id) {
            $result = $this->find('first', array(
                'conditions' => array(
                    'Subject.id' => $id
                ),
                'fields' => array(
                    'Subject.id',
                    'Subject.name',
                    'Subject.access_level'
                )
            ));

            return $result;
        }

        // update subject
        public function updateSubject($id, $name, $accessLevel) {
            $data['name'] = $name;
            $data['access_level'] = $accessLevel;
            $data['modified'] = date('Y-m-d H:i:s');

            $this->read(null, $id);
            $this->set($data);

            $result = $this->save();

            return $result;
        }

    }