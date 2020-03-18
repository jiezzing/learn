<?php
    class ModulesController extends AppController{

        public $uses = array(
            'Module',
            'Submodule',
            'Content',
            'Output'
        );

    	public $page = null;
        public $userId = null;
        public $schoolId = null;
        public $dir = null;

    	public function beforeFilter() {
            parent::beforeFilter();

    		$this->page = 'Modules';
            $this->userId = $this->Session->read('user_id');
            $this->schoolId = $this->Session->read('school_id');
            $this->dir = 'UNIV-' . $this->schoolId;
    	}

        public function index(){
        	$modules = $this->Module->fetchModules($this->schoolId);
            $submodules = array();

            foreach ($modules as $value) {
                $submodules[$value['Module']['id']] = $this->Submodule->fetchSubmodules($value['Module']['id']);
            }

            $this->set('page', $this->page);
            $this->set('module', $modules);
            $this->set('submodule', $submodules);
        }

        public function addModule() {
        	$this->autoRender = false;

        	if($this->request->is('ajax')) {
                $name = $this->request->data['name'];
                $exist = $this->Module->moduleExist($this->schoolId, $name);

                if($exist) {
                    $message = $this->Output->message('moduleExist');
                    $response = $this->Output->error($message);
                }
                else {
                    $result = $this->Module->addModule($this->schoolId, $name);

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

        public function addSubmodule() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $id = $this->request->data['id'];
                $submodule = $this->request->data['submodule'];

                $exist = $this->Submodule->submoduleExist($id, $this->schoolId, $submodule);

                if($exist) {
                    $message = $this->Output->message('submoduleExist');
                    $response = $this->Output->error($message);
                }
                else {
                    $result = $this->Submodule->addSubmodule($id, $this->schoolId,$submodule);

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

        public function addContents() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $id = $this->request->data['id'];
                $stored = false;

                foreach ($_FILES as $key => $file) {
                    $path = $this->dir . '/' . $file['name'];
                    $filepath = $_SERVER['DOCUMENT_ROOT'] . '/learn/school/webroot/files/' . $path;

                    if(move_uploaded_file($file['tmp_name'], $filepath)){
                        $result = $this->Content->addContents($id, $file['name']);
                        $stored = true;
                    }
                    else{
                        $stored = false;
                        break;
                    }
                }

                if($stored) {
                    $message = $this->Output->message('file');
                    $response = $this->Output->success($message);
                }
                else {
                    $message = $this->Output->message('error');
                    $response = $this->Output->error($message);
                }
            }

            return $this->Output->response($response);
        }

        public function contents($id) {
            $filepath = '/learn/school/webroot/files/' . $this->dir . '/';
            $contents = $this->Content->fetchContents($id);
            $submodule = $this->Submodule->fetchSubmoduleData($id);

            $this->set('page', 'Contents');
            $this->set('content', $contents);
            $this->set('submodule', $submodule);
            $this->set('filepath', $filepath);
            $this->set('dir', $this->dir);
        }

        public function fetchSubmoduleData() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $result = $this->Submodule->specificSubmoduleData($this->request->data['id']);

                if($result) {
                    $response = $this->Output->success(null, $result);
                }
                else {
                    $message = $this->Output->message('error');
                    $response = $this->Output->error($message);
                }
            }

            return $this->Output->response($response);
        }
    }
