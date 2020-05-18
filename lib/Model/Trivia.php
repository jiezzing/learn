<?php

    App::uses('AppModel', 'Model');

    class Trivia extends AppModel {

        public $usesTable = 'trivias';

        // tally all trivia
        public function tallyTrivia($schoolId) {
        	$result = $this->find('count', array(
        		'conditions' => array(
                    'Trivia.school_id' => $schoolId
                )
        	));

        	return $result;
        }

        // fetch all trivia
        public function fetchTrivia($schoolId) {
            $result = $this->find('all', array(
                'joins' => array(
                    array(
                        'alias' => 'User',
                        'table' => 'users',
                        'type' => 'INNER',
                        'conditions' => array(
                            'User.id = Trivia.user_id'
                        )
                    )
                ),
                'conditions' => array(
                    'Trivia.school_id' => $schoolId
                ),
                'fields' => array(
                    'Trivia.trivias',
                    'Trivia.created',
                    'User.firstname',
                    'User.lastname'
                )
            ));

            return $result;
        }

    }