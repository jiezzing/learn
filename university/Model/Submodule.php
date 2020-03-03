<?php

    App::uses('AppModel', 'Model');

    class Submodule extends AppModel {

        public $usesTable = 'submodules';

        public function fetchSubmodules($id) {
            $submodules = $this->find('all', array(
                'conditions' => array('module_id' => $id),
                'fields' => array(
                    'id', 
                    'name',
                    'created'
                )
            ));

            return $submodules;
        }



        public function addSubmodule($id, $name, $status) {
            $this->create();

            $data = array(
                'module_id' => $id,
                'name' => $name,
                'status_id' => $status
            );

            $this->set($data);

            return $this->save();
        }

    }