<?php

    class HomeController extends AppController{

    	public $uses = array(
    		'Announcement'
    	);

    	public $page = null;

    	public function beforeFilter() {
            parent::beforeFilter();
    		$this->page = 'Home';
            
            // $this->Auth->allow('index');
    	}

        public function index(){
        	$announcements = $this->Announcement->announcements();
        	$totalAnnouncement = $this->Announcement->count();

        	$data = array(
        		'page' => $this->page,
        		'announcements' => $announcements,
        		'totalAnnouncement' => $totalAnnouncement
        	);
        	
            $this->set('data', $data);
        }
        
    }

?>