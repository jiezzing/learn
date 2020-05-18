<?php

    App::uses('AppModel', 'Model');

    class Submodule extends AppModel {

        public $usesTable = 'submodules';

        // fetch all school submodules
        public function fetchSubmodules($moduleId) {
            $result = $this->find('all', array(
                'conditions' => array(
                    'or' => array(
                        'Submodule.module_id' => $moduleId
                    )
                ),
                'fields' => array(
                    'Submodule.id', 
                    'Submodule.name'
                )
            ));

            return $result;
        }

        // check if submodules name exists
        public function submoduleExist($moduleId, $schoolId, $name) {
            $condition = array(
                'Submodule.module_id' => $moduleId,
                'Submodule.school_id' => $schoolId,
                'Submodule.name' => $name
            );
            
            $result = $this->hasAny($condition);

            return $result;
        }

        // fetch submodule name
        public function fetchSubmoduleData($subId) {
            $result = $this->find('first', array(
                'conditions' => array(
                    'Submodule.id' => $subId
                ),
                'fields' => array(
                    'Submodule.name'
                )
            ));

            return $result;
        }

        // add new school submodule
        public function addSubmodule($moduleId, $schoolId, $name) {
            $this->create();

            $data['module_id'] = $moduleId;
            $data['school_id'] = $schoolId;
            $data['name'] = $name;
            $data['status_id'] = 2;

            $this->set($data);

            $result = $this->save();

            return $result;
        }

        // update submodule name
        public function updateSubmodule($id, $name) {
            $data['name'] = $name;

            $this->read(null, $id);
            $this->set($data);

            $result = $this->save();

            return $result;
        }

        // delete submodule
        public function deleteSubmodule($id) {
            $result = $this->delete($id);

            return $result;
        }

        public function deleteRelatedSubmodule($moduleId) {
            $result = $this->deleteAll(array(
                'Submodule.module_id' => $moduleId
            ));

            return $result;
        }

    }