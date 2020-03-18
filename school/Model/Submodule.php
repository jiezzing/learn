<?php

    App::uses('AppModel', 'Model');

    class Submodule extends AppModel {

        public $usesTable = 'submodules';

        public function fetchSubmodules($id) {
            $result = $this->find('all', array(
                'conditions' => array(
                    'or' => array(
                        'Submodule.module_id' => $id
                    )
                ),
                'fields' => array(
                    'Submodule.id', 
                    'Submodule.name'
                )
            ));

            return $result;
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

        public function specificSubmoduleData($id) {
            $result = $this->find('first', array(
                'conditions' => array(
                    'Submodule.id' => $id
                ),
                'fields' => array(
                    'Submodule.name'
                )
            ));

            return $result;
        }

        public function submoduleExist($moduleId, $schoolId, $name) {
            $condition = array(
                'Submodule.module_id' => $moduleId,
                'Submodule.school_id' => $schoolId,
                'Submodule.name' => $name
            );
            
            $result = $this->hasAny($condition);

            return $result;
        }

    }