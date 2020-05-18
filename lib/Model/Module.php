<?php

    App::uses('AppModel', 'Model');

    class Module extends AppModel {

        public $usesTable = 'modules';

        // fetch all school modules
        public function fetchModules($schoolId) {
            $result = $this->find('all', array(
                'conditions' => array(
                    'Module.school_id' => $schoolId
                ),
                'fields' => array(
                    'Module.id', 
                    'Module.name'
                )
            ));

            return $result;
        }

        // check if module already exists upon saving new data
        public function moduleExist($id, $name) {
            $condition = array(
                'Module.school_id' => $id,
                'Module.name' => $name
            );
            
            $result = $this->hasAny($condition);

            return $result;
        }

        // add new module
        public function addModule($id, $name) {
            $this->create();

            $data['school_id'] = $id;
            $data['name'] = $name;
            $data['status_id'] = 2;

            $this->set($data);

            $result = $this->save();

            return $result;
        }

        // fetch module name
        public function fetchModuleData($moduleId) {
            $result = $this->find('first', array(
                'conditions' => array(
                    'Module.id' => $moduleId
                ),
                'fields' => array(
                    'Module.id', 
                    'Module.name'
                )
            ));

            return $result;
        }

        // delete module
        public function deleteModule($id) {
            $result = $this->delete($id);
            
            return $result;
        }

        // check if name exist in all existing module data
        public function moduleNameExist($moduleId, $schoolId, $name) {
            $condition = array(
                'Module.id' => $moduleId,
                'Module.school_id' => $schoolId,
                'Module.name' => $name
            );
            
            $result = $this->hasAny($condition);

            return $result;
        }

        // update module name
        public function updateModule($id, $name) {
            $data['name'] = $name;

            $this->read(null, $id);
            $this->set($data);

            $result = $this->save();

            return $result;
        }

    }