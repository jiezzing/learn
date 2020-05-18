<?php

    class SectionsController extends AppController{

        public $uses = array(
            'Level',
            'Section'
        );

        public $page = null;
        public $userId = null;
        public $schoolId = null;

        public function beforeFilter() {
            parent::beforeFilter();

            $this->page = 'Sections';
            $this->userId = $this->Auth->user('id');
            $this->schoolId = $this->Auth->user('school_id');
        }

        public function index(){
            if(!$this->Auth->loggedIn()) {
                return $this->redirect($this->Auth->loginAction);
            }
            
            $sections = $this->Section->fetchSections($this->schoolId);
            $IDs = $this->Section->fetchLevelID($this->schoolId);
            $levels = $this->Level->fetchLevels();
            $badges = $this->makeBadge($sections);

            $this->set('page', $this->page);
            $this->set('level', $levels);
            $this->set('badge', $badges);
        }

        public function create(){
            $this->autoRender = false;
            
            if($this->request->is('ajax')) {
                $level = $this->request->data['level'];
                $name = $this->request->data['name'];

                $result = $this->Section->addSection($level, $this->userId, $name);

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

        public function makeBadge($sections) {
            $badges = array();

            foreach ($sections as $value) {
                if(array_key_exists($value['Section']['level_id'], $badges)) {
                    $badges[$value['Section']['level_id']] = $badges[$value['Section']['level_id']] .= '<p><span class="badge badge-success mr-2">' . $value['Section']['name'] . '</span></p>';
                }
                else {
                    $badges[$value['Section']['level_id']] = '<p><span class="badge badge-success mr-2">' . $value['Section']['name'] . '</span></p>';
                }
            }

            return $badges;
        }
        
    }
?>
