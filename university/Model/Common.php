<?php

    App::uses('AppModel', 'Model');
    App::uses('Model', 'User'); 

    class Common extends AppModel {

        public function checkEmail($email) {
            $user = new User();

            $condition = array('email' => $email);
            $result =  $user->hasAny($condition);

            return $result;
        }

        public function response($data) {
            return json_encode($data);
        }

    }