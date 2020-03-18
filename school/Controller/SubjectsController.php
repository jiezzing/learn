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
            $this->userId = $this->Session->read('user_id');
            $this->schoolId = $this->Session->read('school_id');
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
                        $message = $this->Output->message('subjectExist');
                        $response = $this->Output->error($message);
                }
                else {
                    $result = $this->Subject->createSubject($this->schoolId, $name, $levels);  

                    if($result) {
                        $message = $this->Output->message('message');
                        $response = $this->Output->success($message);
                    }
                    else {
                        $message = $this->Output->message('error');
                        $response = $this->Output->error($message);
                    }
                }
            }
            
            return $this->Output->response($response);
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
        
    }
?>
