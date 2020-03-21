<?php

    class SubjectsController extends AppController{

        public $uses = array(
            'Level',
            'Subject',
            'Output'
        );

        public $page = null;
        public $userId = null;
        public $schoolId = null;
        public $dir = null;

        public function beforeFilter() {
            parent::beforeFilter();

            $this->page = 'Subjects';
            $this->userId = $this->Auth->user('id');
            $this->schoolId = $this->Auth->user('school_id');
            $this->dir = 'UNIV-' . $this->schoolId;
        }

        public function index(){
            $levelID = array();
            $subjects = $this->Subject->fetchSubjects();
            $levels = $this->Level->fetchLevels();

            foreach ($subjects as $key => $value) {
                $levelID[$key] = $value['Subject']['access_level'];
            }

            $badge = $this->badge($levelID);
        	
            $this->set('page', $this->page);
            $this->set('level', $levels);
            $this->set('subject', $subjects);
            $this->set('badge', $badge);
        }

        public function create() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $name = $this->request->data['name'];
                $levels = json_encode($this->request->data['levels']);

                $exist = $this->Subject->subjectExist($this->schoolId, $name);

                if($exist) {
                        $message = Output::message('nameExist');
                        $response = Output::error($message);
                }
                else {
                    $result = $this->Subject->createSubject($this->schoolId, $name, $levels);  

                    if($result) {
                        $message = Output::message('message');
                        $response = Output::success($message);
                    }
                    else {
                        $message = Output::message('error');
                        $response = Output::error($message);
                    }
                }
            }
            
            return Output::response($response);
        }

        public function badge($levelID) {
            $badge = null;
            $arrayName = array();
            $accessLevel = array();

            foreach ($levelID as $key => $value) {
                $arrayID = json_decode($value, true);
                foreach ($arrayID as $idKey => $idItem) {
                    $arrayName[$key][$idKey] = $this->Level->levelName($idItem);
                }
            }

            foreach ($arrayName as $nameKey => $nameValue) {
                foreach ($nameValue as $valueKey => $value) {
                    $accessLevel[$nameKey] = $badge .= '<p><span class="badge badge-success mr-2">' . $value["Level"]["name"] . '</span></p>';
                }
                $badge = null;
            }

            return $accessLevel;
        }

        public function deleteSubject() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $id = $this->request->data['id'];

                $delete = $this->Subject->deleteSubject($id);

                if($delete) {
                    $message = Output::message('delete');
                    $response = Output::success($message);
                }
                else {
                    $message = Output::message('error');
                    $response = Output::error($message);
                }
            }
            
            return Output::response($response);
        }

        public function fetchSubjectData() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $id = $this->request->data['id'];

                $result = $this->Subject->fetchSubjectData($id);

                if($result) {
                    $response = Output::success(null, $result);
                }
                else {
                    $message = Output::message('error');
                    $response = Output::error($message);
                }
            }
            
            return Output::response($response);
        }

        public function updateSubject() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $id = $this->request->data['id'];
                $name = $this->request->data['name'];
                $level = $this->request->data['level'];

                $result = $this->Subject->updateSubject($id, $name, json_encode($level));

                if($result) {
                    $message = Output::message('update');
                    $response = Output::success($message);
                }
                else {
                    $message = Output::message('error');
                    $response = Output::error($message);
                }
            }
            
            return Output::response($response);
        }
        
    }
