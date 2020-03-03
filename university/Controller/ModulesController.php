<?php
    class ModulesController extends AppController{

        public $uses = array(
            'Module',
            'Submodule'
        );

    	public $page = null;
    	public $id = null;

    	public function beforeFilter() {
            parent::beforeFilter();
    		$this->page = 'Modules';
    		$this->id = $this->Session->read('user_id');
            
            if(empty($this->Session->read('logged_in'))){
                $this->redirect(array(
                    'controller' => 'login',
                    'action' => 'index'
                ));
            }
    	}

        public function index(){
        	$modules = $this->Module->fetchModules($this->id);

            foreach ($modules as $modulesKey => $modulesItem) {
                $submodules [$modulesItem['Module']['id']] = $this->Submodule->fetchSubmodules($modulesItem['Module']['id']);
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
        			$this->id,
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

        private function output($status, $message) {
            $result = array(
                'status' => $status,
                'message' => $message
            );

            echo json_encode($result);
        }
    }
