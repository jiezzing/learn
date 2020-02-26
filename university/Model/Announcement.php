<?php

    App::uses('AppModel', 'Model');

    class Announcement extends AppModel {

        public $usesTable = 'announcements';

        // fetch announcements
        public function announcements() {
        	$announcements = $this->find('all', array(
                'joins' => array(
                    array(
                        'alias' => 'UserType',
                        'table' => 'user_types',
                        'type' => 'INNER',
                        'conditions' => array(
                            'UserType.id = Announcement.recipient'
                        )
                    )
                ),
                'fields' => array(
                    'id', 
                    'announcement', 
                    'admin_id',
                    'created',
                    'UserType.type'
                ),
                'order' => 'id DESC'
            ));

        	return $announcements;
        }

        public function count() {
            $count = $this->find('count', array(
                'conditions' => array('admin_id' => 2)
            ));

            return $count;
        }

        public function edit($id = null) {
            $details = $this->find('first', array(
                'conditions' => array('id' => $id),
                'fields' => array(
                    'announcement',
                    'recipient'
                )
            ));

            return $details;
        }

    }