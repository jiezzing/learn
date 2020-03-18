<?php

    App::uses('AppModel', 'Model');

    class Content extends AppModel {

        public $usesTable = 'contents';

        public function addContents($subId, $name) {
            $this->create();

            $data = array(
                'sub_id' => $subId,
                'name' => $name,
                'status_id' => 2
            );

            $this->set($data);

            return $this->save();
        }

        public function fetchContents($id) {
            $contents = $this->find('all', array(
                'conditions' => array(
                    'Content.sub_id' => $id
                ),
                'fields' => array(
                    'Content.name'
                )
            ));

            return $contents;
        }

    }