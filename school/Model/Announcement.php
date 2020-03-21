<?php

    App::uses('AppModel', 'Model');

    class Announcement extends AppModel {

        public $usesTable = 'announcements';

        public function fetchAnnouncements($schoolId) {
        	$result = $this->find('all', array(
                'conditions' => array(
                    'Announcement.school_id' => $schoolId
                ),
                'fields' => array(
                    'Announcement.id', 
                    'Announcement.recipient', 
                    'Announcement.announcement', 
                    'Announcement.user_id',
                    'Announcement.created'
                ),
                'order' => 'id DESC'
            ));

        	return $result;
        }

        public function createAnnouncement($userId, $schoolId, $recipient, $announcement) {
            $this->create();

            $data['user_id'] = $userId;
            $data['school_id'] = $schoolId;
            $data['recipient'] = $recipient;
            $data['announcement'] = $announcement;
            $data['status_id'] = 1;

            $this->set($data);

            $result = $this->save();

            return $result;
        }

        public function tallyAnnouncement($id) {
            $result = $this->find('count', array(
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
                'conditions' => array(
                    'Announcement.user_id' => $id
                )
            ));

            return $result;
        }

        public function edit($id = null) {
            $result = $this->find('first', array(
                'conditions' => array(
                    'Announcement.id' => $id
                ),
                'fields' => array(
                    'Announcement.announcement',
                    'Announcement.recipient'
                )
            ));

            return $result;
        }

        public function updateAnnouncement($id, $userId, $schoolId, $recipient, $announcement) {
            $data['user_id'] = $userId;
            $data['school_id'] = $schoolId;
            $data['recipient'] = $recipient;
            $data['announcement'] = $announcement;
            $data['status_id'] = 1;

            $this->read(null, $id);
            $this->set($data);

            $result = $this->save();

            return $result;
        }

    }