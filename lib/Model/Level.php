<?php

    App::uses('AppModel', 'Model');

    class Level extends AppModel {

        public $usesTable = 'levels';

        // fetch all available levels
        public function fetchLevels() {
            $result = $this->find('all', array(
                'conditions' => array(
                    'Level.status_id' => 1
                ),
            	'fields' => array(
            		'Level.id',
            		'Level.name'
            	)
            ));

            return $result;
        }

        // fetch level name
        public function levelName($id) {
            $result = $this->find('first', array(
                'conditions' => array(
                    'Level.id' => $id
                ),
                'fields' => array(
                    'Level.name'
                )
            ));

            return $result;
        }

    }