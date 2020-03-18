<?php

    App::uses('AppModel', 'Model');

    class Module extends AppModel {

        public $usesTable = 'modules';

        public function fetchModules($id) {
            $result = $this->find('all', array(
                'conditions' => array(
                    'Module.school_id' => $id
                ),
                'fields' => array(
                    'Module.id', 
                    'Module.name'
                )
            ));

            return $result;
        }

        public function addModule($id, $name) {
            $this->create();

            $data['school_id'] = $id;
            $data['name'] = $name;
            $data['status_id'] = 2;

            $this->set($data);

            $result = $this->save();

            return $result;
        }

        public function fetchModuleData($id) {
            $result = $this->find('first', array(
                'conditions' => array(
                    'Module.id' => $id
                ),
                'fields' => array(
                    'Module.id', 
                    'Module.name'
                )
            ));

            return $result;
        }

        public function moduleExist($id, $name) {
            $condition = array(
                'Module.school_id' => $id,
                'Module.name' => $name
            );
            
            $result = $this->hasAny($condition);

            return $result;
        }

    }