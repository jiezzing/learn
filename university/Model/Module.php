<?php

    App::uses('AppModel', 'Model');

    class Module extends AppModel {

        public $usesTable = 'modules';

        public function fetchModules($id) {
            $modules = $this->find('all', array(
                // 'joins' => array(
                //     array(
                //         'alias' => 'Submodule',
                //         'table' => 'submodules',
                //         'type' => 'INNER',
                //         'conditions' => array(
                //             'Module.id = Submodule.module_id'
                //         )
                //     )
                // ),
                'conditions' => array(
                    'admin_id' => $id
                ),
                'fields' => array('id', 'name'),
                'order' => 'name'
            ));

            // SELECT COUNT(module_id), modules.id, modules.name  FROM modules, submodules WHERE modules.id=submodules.module_id
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