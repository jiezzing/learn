<?php

    class AnnouncementsController extends AppController{

        public function index(){
        	$page = 'Announcements';
        	
            $this->set(array('page' => $page));
        }
        
    }

?>
