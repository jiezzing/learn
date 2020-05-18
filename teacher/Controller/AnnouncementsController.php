<?php

    class AnnouncementsController extends AppController{

    	public $uses = array(
    		'Announcement',
            'UserType'
    	);

    	public $page = null;
        public $userId = null;
        public $schoolId = null;

    	public function beforeFilter() {
            parent::beforeFilter();

    		$this->page = 'Announcements';
            $this->userId = $this->Auth->user('id');
            $this->schoolId = $this->Auth->user('school_id');
    	}

        public function index(){
            if(!$this->Auth->loggedIn()) {
                return $this->redirect($this->Auth->loginAction);
            }
            
        	$announcements = $this->Announcement->fetchAnnouncements($this->schoolId);
            $recipients = $this->recipientBadges($announcements);
            $types = $this->UserType->fetchUserTypes();

            $this->set('page', $this->page);
            $this->set('announcement', $announcements);
            $this->set('type', $types);
            $this->set('recipient', $recipients);
        }

        public function create(){
            $types = $this->UserType->fetchUserTypes();

            $this->set('page', 'Creating Announcement');
            $this->set('type', $types);
        }
        
        public function publish() {
        	$this->autoRender = false;

        	if ($this->request->is('ajax')) {
                $recipient = json_encode($this->request->data['recipient']);
                $announcement = json_encode($this->request->data['announcement']);

                $result = $this->Announcement->createAnnouncement(
                    $this->userId, 
                    $this->schoolId, 
                    $recipient, 
                    $announcement
                );

    			if($result) {
    				$message = Output::message('message');
                    $response = Output::success($message);
    			}
    			else {
                    $message = Output::message('error');
                    $response = Output::error($message);
    			}
        	}

            return Output::response($response);
        }

        public function delete() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $id = $this->request->data['id'];

                $result = $this->Announcement->deleteAnnouncement($id);

                if($result) {
                    $message = Output::message('delete');
                    $response = Output::success($message);
                }
                else {
                    $message = Output::message('error');
                    $response = Output::error($message);
                }
            }

            return Output::response($response);
        }

        public function edit($id = null) {
            $details = $this->Announcement->fetchAnnouncementData($id);
            $types = $this->UserType->fetchUserTypes();

            $this->set('page', $this->page);
            $this->set('detail', $details);
            $this->set('type', $types);
        }

        public function fetchAnnouncementsData() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $id = $this->request->data['id'];
                $result = $this->Announcement->fetchAnnouncementData($id);
                $recipients = $this->recipients($result);
                
                if($result) {
                    $result['Announcement']['recipient'] = $recipients;
                    $response = Output::success(null, $result);
                }
                else {
                    $message = Output::message('error');
                    $response = Output::error($message);
                }
            }

            return Output::response($response);
        }

        public function update() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $id = $this->request->data['id'];
                $recipient = json_encode($this->request->data['recipient']);
                $announcement = json_encode($this->request->data['announcement']);

                $result = $this->Announcement->updateAnnouncement(
                    $id,
                    $this->userId,
                    $this->schoolId, 
                    $recipient, 
                    $announcement
                );

                if($result) {
                    $message = Output::message('update');
                    $response = Output::success($message);
                }
                else {
                    $message = Output::message('error');
                    $response = Output::error($message);
                }
            }

            return Output::response($response);
        }

        public function updateStatus() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $id = $this->request->data['id'];
                $status = $this->request->data['status'];

                $result = $this->Announcement->updateStatus($id, $status);

                if($result) {
                    $message = Output::message('update');
                    $response = Output::success($message);
                }
                else {
                    $message = Output::message('error');
                    $response = Output::error($message);
                }
            }

            return Output::response($response);
        }

        public function recipientBadges($recipient) {
            $recipients = array();

            foreach ($recipient as $value) {
                $listOfRecipients = json_decode($value['Announcement']['recipient'], true);

                foreach ($listOfRecipients as $key => $recipientItem) {
                    $userType = $this->UserType->type($recipientItem);

                    if(array_key_exists($value['Announcement']['id'], $recipients)) {
                        $recipients[$value['Announcement']['id']] = $recipients[$value['Announcement']['id']] .= '<p><span class="badge badge-success mr-2">' . $userType['UserType']['type'] . '</span></p>';
                    }
                    else {
                        $recipients[$value['Announcement']['id']] = '<p><span class="badge badge-success mr-2">' . $userType['UserType']['type'] . '</span></p>';
                    }
                }
            }

            return $recipients;
        }

        public function recipients($data) {
            $recipients = null;

            $listOfRecipients = json_decode($data['Announcement']['recipient'], true);
            foreach ($listOfRecipients as $key => $recipientItem) {
                $userType = $this->UserType->type($recipientItem);
                $recipients = $recipients .= $userType['UserType']['type'] . ', ';
            }

            return $recipients;
        }
    }

?>
