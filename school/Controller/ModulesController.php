<?php
    class ModulesController extends AppController{

        public $uses = array(
            'Module',
            'Submodule',
            'Content'
        );

        public $userId = null;
        public $schoolId = null;

    	public function beforeFilter() {
            parent::beforeFilter();

            $this->userId = $this->Auth->user('user_id');
            $this->schoolId = $this->Auth->user('school_id');
    	}

        public function index(){
            if(!$this->Auth->loggedIn()) {
                return $this->redirect($this->Auth->loginAction);
            }
            
            $submodules = array();
        	$modules = $this->Module->fetchModules($this->schoolId);

            foreach ($modules as $value) {
                $submodules[$value['Module']['id']] = $this->Submodule->fetchSubmodules($value['Module']['id']);
            }

            $this->set('page', 'Modules');
            $this->set('module', $modules);
            $this->set('submodule', $submodules);
        }

        public function addModule() {
        	$this->autoRender = false;

        	if($this->request->is('ajax')) {
                $exist = $this->Module->moduleExist(
                    $this->schoolId, 
                    $this->request->data['name']
                );

                if($exist) {
                    $message = Output::message('nameExist');
                    $response = Output::error($message);
                }
                else {
                    $result = $this->Module->addModule(
                        $this->schoolId, 
                        $this->request->data['name']
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

        public function addSubmodule() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $exist = $this->Submodule->submoduleExist(
                    $this->request->data['id'], 
                    $this->schoolId, 
                    $this->request->data['submodule']
                );

                if($exist) {
                    $message = Output::message('nameExist');
                    $response = Output::error($message);
                }
                else {
                    $result = $this->Submodule->addSubmodule(
                        $this->request->data['id'],
                        $this->schoolId,
                        $this->request->data['submodule']
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

        public function addContents() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                foreach ($_FILES as $file) {
                    $filepath = $_SERVER['DOCUMENT_ROOT'] . '/learn/school/webroot/files/' . $file['name'];

                    if(move_uploaded_file($file['tmp_name'], $filepath)){
                        $result = $this->Content->addContents(
                            $this->request->data['id'], 
                            $file['name']
                        );

                        if($result) {
                            $message = Output::message('file');
                            $response = Output::success($message);
                        }
                        else {
                            $message = Output::message('error');
                            $response = Output::error($message);
                        }
                    }
                    else{
                        $message = Output::message('uploadFail');
                        $response = Output::error($message);
                    }
                }
            }

            return Output::response($response);
        }

        public function contents($id) {
            $contents = $this->Content->fetchContents($id);
            $submodules = $this->Submodule->fetchSubmoduleData($id);

            $this->set('page', 'Contents');
            $this->set('content', $contents);
            $this->set('submodule', $submodules);
        }

        public function fetchSubmoduleData() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $result = $this->Submodule->fetchSubmoduleData(
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

        public function updateSubmodule() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $exist = $this->Submodule->submoduleExist(
                    $this->request->data['moduleId'],
                    $this->schoolId, 
                    $this->request->data['name']
                );

                if($exist) {
                    $message = Output::message('noChanges');
                    $response = Output::info($message);
                }
                else {  
                    $result = $this->Submodule->updateSubmodule(
                        $this->request->data['id'], 
                        $this->request->data['name']
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
            }

            return Output::response($response);
        }

        public function deleteSubmodule() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $delete = $this->Submodule->deleteSubmodule(
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

        public function fetchModuleData() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $result = $this->Module->fetchModuleData(
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

        public function updateModule() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $exist = $this->Module->moduleNameExist(
                    $this->request->data['id'], 
                    $this->schoolId, 
                    $this->request->data['name']
                );

                if($exist) {
                    $message = Output::message('noChanges');
                    $response = Output::success($message);
                }
                else {  
                    $result = $this->Module->updateModule(
                        $this->request->data['id'], 
                        $this->request->data['name']
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
            }

            return Output::response($response);
        }

        public function deleteModule() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $delete = $this->Module->deleteModule(
                    $this->request->data['id']
                );

                if($delete) {
                    $deleteSubmodules = $this->Submodule->deleteRelatedSubmodule(
                        $this->request->data['id']
                    );
                    
                    if($deleteSubmodules) {
                        $message = Output::message('delete');
                        $response = Output::success($message);
                    }
                }
                else {  
                    $message = Output::message('error');
                    $response = Output::error($message);
                }
            }

            return Output::response($response);
        }

        public function deleteContent() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $delete = $this->Content->deleteContent(
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

    }
