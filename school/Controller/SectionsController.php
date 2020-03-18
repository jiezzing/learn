<?php

    class SectionsController extends AppController{

        public $uses = array(
            'Level',
            'Common',
            'Section'
        );

        public function beforeFilter() {
            parent::beforeFilter();
        }

        public function index(){
            $levels = $this->Level->fetchLevels();
            $sections = $this->Section->fetchSections($this->Session->read('user_id'));
            $IDs = $this->Section->fetchLevelID($this->Session->read('user_id'));
            $badges = $this->makeBadge($sections, $IDs, $levels);

            $this->set('page',  'Sections');
            $this->set('level', $levels);
            $this->set('badge', $badges);
        }

        public function create(){
            $this->autoRender = false;
            
            if($this->request->is('ajax')) {
                $stored = $this->Section->addSection(
                    $this->request->data['level'],
                    $this->Session->read('user_id'),
                    $this->request->data['name'],
                    2
                );

                if($stored) {
                    $data = array(
                        'status' => 1,
                        'message' => 'New section has been successfully saved.'
                    );
                }
                else {
                    $data = array(
                        'status' => 0,
                        'message' => 'An error occured during your request. Please try again.'
                    );
                }

                $this->Common->response($data);
            }
        }

        public function makeBadge($data, $IDs, $level) {
            $badge = null;
            $badgeSections = array();

            foreach ($data as $key => $value) {
                if($key > 1) {
                    if($value['Section']['level_id'] != $IDs[$key - 1]['Section']['level_id']) {
                         $badge = null;
                    } 
                    $badges[$value['Section']['level_id']] = $badge .= '<p><span class="badge badge-success mr-2">' . $value['Section']['name'] . '</span></p>';
                }
                else {
                    $badges[$value['Section']['level_id']] = $badge .= '<p><span class="badge badge-success mr-2">' . $value['Section']['name'] . '</span></p>';
                }
            }

            foreach ($level as $key => $value) {
                if(isset($badges[$key + 1])) {
                    $badgeSections[$value['Level']['id']] = $badges[$key + 1];
                }
            }

            return $badgeSections;
        }
        
    }
?>
