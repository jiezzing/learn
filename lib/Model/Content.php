<?php

    App::uses('AppModel', 'Model');

    class Content extends AppModel {

        public $usesTable = 'contents';

        // add new submodule contents
        public function addContents($subId, $name, $status = 1) {
            $this->create();

            $data['sub_id'] = $subId;
            $data['name'] = $name;
            $data['status_id'] = $status;

            $this->set($data);

            $result = $this->save();

            return $result;
        }

        // fetch all submodule contents
        public function fetchContents($subId) {
            $contents = $this->find('all', array(
                'conditions' => array(
                    'Content.sub_id' => $subId
                ),
                'fields' => array(
                    'Content.name',
                    'Content.created',
                    'Content.id'
                )
            ));

            return $contents;
        }

        // delete content
        public function deleteContent($id) {
            $result = $this->delete($id);
            
            return $result;
        }

    }