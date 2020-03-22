<?php

    class HomeController extends AppController{

    	public $uses = array(
    		'Announcement',
            'User'
    	);

    	public $page = null;
        public $schoolId = null;

    	public function beforeFilter() {
            parent::beforeFilter();

    		$this->page = 'Home';
            $this->Auth->allow('index');
            $this->schoolId = $this->Auth->user('school_id');
    	}

        public function afterFilter() {
            parent::afterFilter();
        }

        public function index(){
            if(!$this->Auth->loggedIn()) {
                return $this->redirect($this->Auth->loginAction);
            }

        	$announcements = $this->Announcement->fetchAnnouncements($this->schoolId);
        	$totalAnnouncement = $this->Announcement->tallyAnnouncement($this->schoolId);
            $tally = $this->User->tally($this->Auth->user('id'));
            
            $this->set('page', 'Home');
            $this->set('announcement', $announcements);
            $this->set('totalAnnouncement', $totalAnnouncement);
            $this->set('stats', $tally);
        }
        
    }

?>
