<?php

    class HomeController extends AppController{

    	public $uses = array(
    		'Announcement',
            'User',
            'Trivia'
    	);

    	public $page = null;
        public $schoolId = null;

    	public function beforeFilter() {
            parent::beforeFilter();

    		$this->page = 'Home';
            $this->schoolId = $this->Auth->user('school_id');
    	}

        public function index() {
            if(!$this->Auth->loggedIn()) {
                return $this->redirect($this->Auth->loginAction);
            }

        	$announcements = $this->Announcement->fetchAnnouncements($this->schoolId);
            $trivias = $this->Trivia->fetchTrivia($this->schoolId);
        	$totalAnnouncement = $this->Announcement->tallyAnnouncement($this->schoolId);
            $tallyUsers = $this->User->tallyUsers($this->schoolId);
            $tallyTrivia = $this->Trivia->tallyTrivia($this->schoolId);

            $this->set('page', 'Home');
            $this->set('announcement', $announcements);
            $this->set('totalAnnouncement', $totalAnnouncement);
            $this->set('stats', $tallyUsers);
            $this->set('tallyTrivia', $tallyTrivia);
            $this->set('trivia', $trivias);
        }
        
    }
