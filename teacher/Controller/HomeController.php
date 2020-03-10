<?php

    class HomeController extends AppController{

    	public $uses = array(
    		'Announcement',
            'User'
    	);

    	public $page = null;

    	public function beforeFilter() {
            parent::beforeFilter();
    		$this->page = 'Home';
    	}

        public function afterFilter() {
            parent::afterFilter();
        }

        public function index(){
        	$announcements = $this->Announcement->announcements();
        	$totalAnnouncement = $this->Announcement->tallyAnnouncement($this->Session->read('user_id'));
            $tally = $this->User->tally($this->Session->read('user_id'));

        	$data = array(
        		'page' => $this->page,
        		'announcements' => $announcements,
        		'totalAnnouncement' => $totalAnnouncement,
                'stats' => $tally
        	);
        	
            $this->set('data', $data);
        }
        
    }

?>
