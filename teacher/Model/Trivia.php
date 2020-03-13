<?php

    App::uses('AppModel', 'Model');

    class Trivia extends AppModel {

        public $usesTable = 'trivias';

        public function fetchTrivias($id) {
        	$result = $this->find('all', array(
        		'conditions' => array(
        			'Trivia.univ_id' => $id
        		),
        		'fields' => array(
	        		'Trivia.id',
	        		'Trivia.trivias',
	        		'Trivia.created'
        		)
        	));

        	return $result;
        }

        public function createTrivia($userID, $univID, $trivia, $status) {
        	$this->create();

        	$data = array(
        		'user_id' => $userID,
        		'univ_id' => $univID,
        		'trivias' => $trivia,
        		'status_id' => $status
        	);

        	$this->set($data);

        	$result = $this->save();

        	return $result;
        }
    }