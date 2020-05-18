<?php

    App::uses('AppModel', 'Model');

    class Announcement extends AppModel {

        public $usesTable = 'announcements';

        // fetch all school announcements
        public function fetchAnnouncements($schoolId) {
        	$result = $this->find('all', array(
                'joins' => array(
                    array(
                        'alias' => 'User',
                        'table' => 'users',
                        'type' => 'INNER',
                        'conditions' => array(
                            'Announcement.user_id = User.id'
                        )
                    ),
                    array(
                        'alias' => 'UserType',
                        'table' => 'user_types',
                        'type' => 'INNER',
                        'conditions' => array(
                            'UserType.id = User.user_type'
                        )
                    ),
                    array(
                        'alias' => 'Status',
                        'table' => 'status',
                        'type' => 'INNER',
                        'conditions' => array(
                            'Announcement.status_id = Status.id'
                        )
                    )
                ),
                'conditions' => array(
                    'Announcement.school_id' => $schoolId
                ),
                'fields' => array(
                    'Announcement.id', 
                    'Announcement.recipient', 
                    'Announcement.announcement', 
                    'Announcement.user_id',
                    'Announcement.created',
                    'User.firstname',
                    'User.lastname',
                    'UserType.type',
                    'Status.status'
                ),
                'order' => 'Announcement.id DESC'
            ));

        	return $result;
        }

        // tally or count all school announcement
        public function tallyAnnouncement($schoolId) {
            $result = $this->find('count', array(
                'conditions' => array(
                    'Announcement.school_id' => $schoolId
                )
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

        public function fetchAnnouncementData($id) {
            $result = $this->find('first', array(
                'joins' => array(
                    array(
                        'alias' => 'User',
                        'table' => 'users',
                        'type' => 'INNER',
                        'conditions' => array(
                            'User.id = Announcement.user_id'
                        )
                    )
                ),
                'conditions' => array(
                    'Announcement.id' => $id
                ),
                'fields' => array(
                    'Announcement.announcement',
                    'Announcement.recipient',
                    'DATE_FORMAT(Announcement.created, "%M %d, %Y") as date',
                    'User.firstname',
                    'User.lastname'
                )
            ));

            return $result;
        }

        public function updateAnnouncement($id, $userId, $schoolId, $recipient, $announcement) {
            $this->clear();

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

        public function deleteAnnouncement($id) {
            $result = $this->delete($id);

            return $result;
        }

        public function updateStatus($id, $status) {
            $this->clear();

            $data['status_id'] = $status;

            $this->read(null, $id);
            $this->set($data);

            $result = $this->save();

            return $result;
        }

    }