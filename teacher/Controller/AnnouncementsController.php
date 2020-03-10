<?php

    class AnnouncementsController extends AppController{

    	public $uses = array(
    		'Announcement',
            'UserType'
    	);

    	public $page = null;

    	public function beforeFilter() {
            parent::beforeFilter();
    		$this->page = 'Announcements';
    	}

    	// show announcements
        public function index(){
        	$announcements = $this->Announcement->announcements();

        	$data = array(
        		'page' => $this->page,
        		'announcements' => $announcements
        	);

            $this->set('data', $data);
        }
        
        // create announcement
        public function create() {
            $types = $this->UserType->fetchUserTypes();

        	$data = array(
        		'page' => $this->page,
                'types' => $types
        	);

        	
            $this->set('data', $data);
        }
        
        // publish created announcement
        public function publish() {
        	$this->autoRender = false;

        	if ($this->request->is('ajax')) {
        		$checkFields = $this->emptyFieldsChecker($_POST); 

        		if ($checkFields) {
        			return $this->output(0, 'Announcement title must not be empty.');
        		}
        		else {
        			$this->Announcement->create();

        			$data = array(
        				'admin_id' => 2,
        				'announcement' => json_encode($this->request->data['announcement']),
        				'status_id' => 1,
        			);

        			$this->Announcement->set($data);

        			if ($this->Announcement->save()) {
        				return $this->output(1, 'Announcement successfully published.');
        			}
        			else {
        				return $this->output(0, 'An error occured, please try again.');
        			}
        		}
        	}
        }

        public function delete() {
            $this->autoRender = false;

            if ($this->request->is('ajax')) {
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

            $data = array(
                'page' => 'Editing announcement',
                'details' => $details,
                'types' => $types
            );

            $this->set('data', $data);
        }

        public function update() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {

                $announcement = array(
                    'title' => $this->request->data['announcement']['title'],
                    'description' => $this->request->data['announcement']['description'],
                    'announcement' => $this->request->data['announcement']['announcement']
                );

                $data = array(
                    'admin_id' => $this->Session->read('user_id'),
                    'univ_id' => 1,
                    'recipient' => $this->request->data['announcement']['recipient'],
                    'announcement' => json_encode($announcement)
                );

                $this->Announcement->read(null, $this->request->data['id']);

                $this->Announcement->set($data);

                if ($this->Announcement->save()) {
                    return $this->output(1, 'Announcement successfully updated.');
                }
                else {
                    return $this->output(0, 'An error occured, please try again.');
                }
            }
        }

        // validate fields if empty
        private function emptyFieldsChecker($data = array()) {
        	foreach ($data as $key => $value) {
        		if (empty($value)) {
        			return true;
        		}
        	}
        }

        // display
        private function output($status, $message) {
        	$result = array(
        		'status' => $status,
        		'message' => $message
        	);

        	echo json_encode($result);
        }
    }

?>
