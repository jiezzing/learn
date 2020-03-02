<?php

    App::uses('AppModel', 'Model');

    class Submodule extends AppModel {

        public $usesTable = 'submodules';

        public function fetchSubmodules($id) {
            $submodules = $this->find('all', array(
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
            
            return $submodules;
        }

    }