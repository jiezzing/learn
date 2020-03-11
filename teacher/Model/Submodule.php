<?php

    App::uses('AppModel', 'Model');

    class Submodule extends AppModel {

        public $usesTable = 'submodules';

        public function fetchSubmodules($id) {
            $submodules = $this->find('all', array(
                'conditions' => array('module_id' => $id),
                'fields' => array(
                    'id', 
                    'name'
                )
            ));

            return $submodules;
        }

        public function fetchSubmoduleData($id) {
            $data = $this->find('all', array(
                'conditions' => array(
                    'Submodule.id' => $id
                ),
                'fields' => array(
                    'Submodule.name'
                )
            ));

            return $data[0];
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