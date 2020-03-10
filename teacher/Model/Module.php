<?php

    App::uses('AppModel', 'Model');

    class Module extends AppModel {

        public $usesTable = 'modules';

        public function fetchModules($id) {
            $modules = $this->find('all', array(
                'conditions' => array('admin_id' => $id),
                'fields' => array('id', 'name')
            ));

            return $modules;
        }

        public function addModule($id, $name, $status) {
            $this->create();

            $data = array(
                'admin_id' => $id,
                'name' => $name,
                'status_id' => $status
            );

            $this->set($data);

            return $this->save();
        }

    }