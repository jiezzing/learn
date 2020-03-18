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
            
            $this->set('page', 'Home');
            $this->set('announcement', $announcements);
            $this->set('totalAnnouncement', $totalAnnouncement);
            $this->set('stats', $tally);
        }

        public function sample() {
            echo "Sample";
        }
        
    }

?>
