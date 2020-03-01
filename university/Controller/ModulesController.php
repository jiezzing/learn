<?php
    class ModulesController extends AppController{

        public $uses = array(
            'Module'
        );

    	public $page = null;
    	public $id = null;

    	public function beforeFilter() {
            parent::beforeFilter();
    		$this->page = 'Modules';
    		$this->id = $this->Session->read('user_id');
    	}

        public function index(){
        	$modules = $this->Module->fetchModules($this->id);
        	$data = array(
        		'page' => $this->page,
        		'modules' => $modules
        	);

        	// debug($modules);

            $this->set('data', $data);
        }

        public function create() {
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

        private function output($status, $message) {
            $result = array(
                'status' => $status,
                'message' => $message
            );

            echo json_encode($result);
        }
    }
