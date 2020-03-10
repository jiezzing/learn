<?php
    class ModulesController extends AppController{

        public $uses = array(
            'Module',
            'Submodule',
            'Content'
        );

    	public $page = null;

    	public function beforeFilter() {
            parent::beforeFilter();
    		$this->page = 'Modules';
            
            if(empty($this->Session->read('logged_in'))){
                $this->redirect(array(
                    'controller' => 'login',
                    'action' => 'index'
                ));
            }
    	}

        public function index(){
        	$modules = $this->Module->fetchModules($this->Session->read('user_id'));
            $submodules = array();

            foreach ($modules as $value) {
                $submodules [$value['Module']['id']] = $this->Submodule->fetchSubmodules($value['Module']['id']);
            }

            $data = array(
                'page' => $this->page,
                'modules' => $modules,
                'submodules' => $submodules
            );

            $this->set('data', $data);
        }

        public function addModule() {
        	$this->autoRender = false;

        	if($this->request->is('ajax')) {
        		$result = $this->Module->addModule(
        			$this->Session->read('user_id'),
	                $this->request->data['name'],
	                2
	            );

        		if($result) {
        			$this->output(1, $this->request->data['name'] . ' has been successfully created.');
        		}
        		else {
        			$this->output(0, 'An error occured. Please try again.');
        		}
        	}
        }

        public function addSubmodule() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $result = $this->Submodule->addSubmodule(
                    $this->request->data['id'],
                    $this->request->data['submodule'],
                    2
                );

                if($result) {
                    $this->output(1, $this->request->data['submodule'] . ' has been successfully added.');
                }
                else {
                    $this->output(0, 'An error occured. Please try again.');
                }
            }
        }

        public function addContents() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {

                foreach ($_FILES as $key => $file) {
                    $filepath = $_SERVER['DOCUMENT_ROOT'] . '/learn/university/webroot/files/UNIV-1/' . $file['name'];

                    if(move_uploaded_file($file['tmp_name'], $filepath)){
                        $result = $this->Content->addContents(
                            $this->request->data['id'],
                            $file['name'],
                            2
                        );
                    }
                    else{
                        $status = 0;
                        $message = 'Unable to upload file, please try again.';
                    }
                   
                }

                // if($result) {
                //     $this->output(1, $this->request->data['submodule'] . ' has been successfully added.');
                // }
                // else {
                //     $this->output(0, 'An error occured. Please try again.');
                // }
            }
        }

        public function contents($id) {
            $contents = $this->Content->fetchContents($id);
            $submodule = $this->Submodule->fetchSubmoduleData($id);

            $data = array(
                'page' => 'Contents',
                'contents' => $contents,
                'submodule' => $submodule
            );

            $this->set('data', $data);
            $this->render('contents');
        }

        private function output($status, $message) {
            $result = array(
                'status' => $status,
                'message' => $message
            );

            echo json_encode($result);
        }
    }
