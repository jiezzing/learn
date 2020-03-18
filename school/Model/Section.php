<?php

    App::uses('AppModel', 'Model');

    class Section extends AppModel {

        public $usesTable = 'sections';

        public function fetchSections($univ_id) {
            $result = $this->find('all', array(
                'conditions' => array(
                    'Section.univ_id' => $univ_id
                ),
                'fields' => array(
                    'Section.id',
                    'Section.level_id',
                    'Section.name'
                )
            ));

            return $result;
        }

        public function fetchLevelID($univ_id) {
            $result = $this->find('all', array(
                'conditions' => array(
                    'Section.univ_id' => $univ_id
                ),
                'fields' => array(
                    'Section.level_id'
                )
            ));

            return $result;
        }

        public function addSection($level_id, $univ_id, $name, $status) {
        	$this->create();

            $data = array(
                'level_id' => $level_id,
                'univ_id' => $univ_id,
                'name' => $name,
                'status_id' => $status
            );

            $this->set($data);
            $result = $this->save();

            return $result;
        }

    }