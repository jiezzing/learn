<?php

    class SubjectsController extends AppController{

        public $uses = array(
            'Level',
            'Subject'
        );

        public $schoolId = null;
        public $dir = null;

        public function beforeFilter() {
            parent::beforeFilter();

            $this->schoolId = $this->Auth->user('school_id');
            $this->dir = 'UNIV-' . $this->schoolId;
        }

        public function index() {
            if(!$this->Auth->loggedIn()) {
                return $this->redirect($this->Auth->loginAction);
            }
            
            $accessLevels = $this->Subject->fetchSubjectAccessLevels($this->schoolId);
            $subjects = $this->Subject->fetchSubjects($this->schoolId);
            $levels = $this->Level->fetchLevels();
            $badges = $this->makeBadge($accessLevels);
        	
            $this->set('page', 'Subjects');
            $this->set('subject', $subjects);
            $this->set('level', $levels);
            $this->set('badge', $badges);
        }

        public function create() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $exist = $this->Subject->subjectExist(
                    $this->schoolId, 
                    $this->request->data['name']
                );

                if($exist) {
                        $message = Output::message('nameExist');
                        $response = Output::error($message);
                }
                else {
                    $result = $this->Subject->createSubject(
                        $this->schoolId, 
                        $this->request->data['name'], 
                        json_encode($this->request->data['levels'])
                    );  

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

        public function deleteSubject() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $delete = $this->Subject->deleteSubject(
                    $this->request->data['id']
                );

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
                $result = $this->Subject->fetchSubjectData(
                    $this->request->data['id']
                );

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
                $result = $this->Subject->updateSubject(
                    $this->request->data['id'], 
                    $this->request->data['name'], 
                    json_encode($this->request->data['level'])
                );

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

        public function makeBadge($data) {
            $badge = null;
            $arrayName = array();
            $badges = array();

            foreach ($data as $key => $value) {
                $arrayID = json_decode($value['Subject']['access_level'], true);
                foreach ($arrayID as $idKey => $idItem) {
                    $arrayName[$key][$idKey] = $this->Level->levelName($idItem);
                }
            }

            foreach ($arrayName as $nameKey => $nameValue) {
                foreach ($nameValue as $valueKey => $value) {
                    $badges[$nameKey] = $badge .= '<p><span class="badge badge-success mr-2">' . $value["Level"]["name"] . '</span></p>';
                }
                $badge = null;
            }

            return $badges;
        }
        
    }
