<?php

    App::uses('AppModel', 'Model');

    class Module extends AppModel {

        public $usesTable = 'modules';

        public function fetchModules($id) {
            $modules = $this->find('all', array(
                'joins' => array(
                    array(
                        'alias' => 'Submodule',
                        'table' => 'submodules',
                        'type' => 'INNER'
                    )
                ),
                'conditions' => array(
                    'admin_id' => $id,
                            'Module.id = Submodule.module_id'
                ),
                'fields' => array(
                    'Module.id', 
                    'Module.name',
                    'Submodule.name',
                    'Submodule.id'
                )
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

        public function addSubmodule($id, $name, $status) {
            $Submodule = CLassRegistry::init('Submodule');

            $Submodule->create();

            $data = array(
                'module_id' => $id,
                'name' => $name,
                'status_id' => $status
            );

            $Submodule->set($data);

            return $Submodule->save();
        }

    }