<?php

    class AnnouncementsController extends AppController{

    	public $uses = array(
    		'Announcement',
            'UserType'
    	);

    	public $page = null;
        public $userId = null;
        public $schoolId = null;
        public $announcementId = null;

    	public function beforeFilter() {
            parent::beforeFilter();

    		$this->page = 'Announcements';
            $this->userId = $this->Auth->user('id');
            $this->schoolId = $this->Auth->user('school_id');
    	}

        public function index(){
        	$announcements = $this->Announcement->fetchAnnouncements($this->schoolId);
            $recipients = $this->recipientBadges($announcements);
            $types = $this->UserType->fetchUserTypes();

            $this->set('page', $this->page);
            $this->set('announcement', $announcements);
            $this->set('type', $types);
            $this->set('recipient', $recipients);
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
                $data = $this->request->data['id'];

                $deleteAnnouncement = $this->Announcement->delete($data);

                if ($deleteAnnouncement) {
                    return $this->output(1, 'Succesfully deleted.');
                }
                else {
                    return $this->output(0, 'An error occured upon deleting announcement. Please try again.');
                }
            }
        }

        public function edit($id = null) {
            $details = $this->Announcement->edit($id);
            $types = $this->UserType->fetchUserTypes();
            
            $this->announcementId = $this->request->params['pass'][0];

            $this->set('page', $this->page);
            $this->set('detail', $details);
            $this->set('type', $types);
        }

        public function update() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $recipient = json_encode($this->request->data['recipient']);
                $announcement = json_encode($this->request->data['announcement']);

                $result = $this->Announcement->updateAnnouncement(
                    $this->userId,
                    $this->schoolId,
                    $this->announcementId, 
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
    }

?>
