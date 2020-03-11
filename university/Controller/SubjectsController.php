<?php

    class SubjectsController extends AppController{

        public $uses = array(
            'Level',
            'Subject',
            'Common'
        );

        public function beforeFilter() {
            parent::beforeFilter();
        }

        public function index(){
            $subjects = $this->Subject->fetchSubjects();
            $levels = $this->Level->fetchLevels();

            foreach ($subjects as $key => $value) {
                $levelID[$key] = $value['Subject']['access_level'];
            }

            $badge = $this->badge($levelID);

        	$data = array(
        		'page' => 'Subjects',
                'level' => $levels,
                'subject' => $subjects,
                'badge' => $badge
        	);
        	
            $this->set('data', $data);
        }

        public function create() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $result = $this->Subject->createSubject(
                    $this->Session->read('user_id'), 
                    $this->request->data['name'], 
                    json_encode($this->request->data['levels']),
                    2
                );  

                if($result) {
                    $response = array(
                        'status' => 1,
                        'message' => 'Successfully added.'
                    );
                }
                else {
                    $response = array(
                        'status' => 0,
                        'message' => 'An error occured'
                    );
                }

                return $this->Common->response($response);
            }
        }

        public function badge($levelID) {
            $badge = null;

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
