<?php

    App::uses('AppModel', 'Model');

    class Content extends AppModel {

        public $usesTable = 'contents';

        public function addContents($subId, $name, $status) {
            $this->create();

            $data = array(
                'sub_id' => $subId,
                'name' => $name,
                'status_id' => $status
            );

            $this->set($data);

            return $this->save();
        }

        public function fetchContents($id) {
            $contents = $this->find('all', array(
                'conditions' => array('sub_id' => $id),
                'fields' => array(
                    'id', 
                    'name'
                )
            ));

            return $contents;
        }

    }