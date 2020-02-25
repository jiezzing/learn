<?php

    class HomeController extends AppController{

    	public $uses = array(
    		'Announcement'
    	);

    	public $page = null;

    	public function beforeFilter() {
    		$this->page = 'Home';
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
