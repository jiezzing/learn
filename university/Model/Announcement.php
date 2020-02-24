<?php

    App::uses('AppModel', 'Model');

    class Announcement extends AppModel {

        public $usesTable = 'announcements';

        public function fetchAnnouncements() {
        	$types = $this->find('all', array(
                'fields' => array('id', 'announcement', 'admin_id')
            ));

        	return $types;
        }

    }