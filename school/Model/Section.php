<?php

    App::uses('AppModel', 'Model');

    class Section extends AppModel {

        public $usesTable = 'sections';

        public function fetchSections($schoolId) {
            $result = $this->find('all', array(
                'conditions' => array(
                    'Section.school_id' => $schoolId
                ),
                'fields' => array(
                    'Section.id',
                    'Section.level_id',
                    'Section.name'
                )
            ));

            return $result;
        }

        public function fetchLevelID($schoolId) {
            $result = $this->find('all', array(
                'conditions' => array(
                    'Section.school_id' => $schoolId
                ),
                'fields' => array(
                    'Section.level_id'
                )
            ));

            return $result;
        }

        public function addSection($levelId, $schoolId, $name) {
            $this->create();

            $data['level_id'] = $levelId;
            $data['school_id'] = $schoolId;
            $data['name'] = $name;
            $data['status_id'] = 1;

            $this->set($data);

            $result = $this->save();

            return $result;
        }

    }