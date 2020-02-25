<?php

    App::uses('AppModel', 'Model');

    class Announcement extends AppModel {

        public $usesTable = 'announcements';

        // fetch announcements
        public function announcements() {
        	$types = $this->find('all', array(
                'fields' => array(
                    'id', 
                    'announcement', 
                    'admin_id',
                    'created'
                ),
                'order' => 'id DESC'
            ));

        	return $types;
        }

        public function count() {
            $count = $this->find('count', array(
                'conditions' => array('admin_id' => 2)
            ));

            return $count;
        }

    }