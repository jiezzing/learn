<?php

    App::uses('AppModel', 'Model');
    App::uses('Model', 'User'); 

    class Validator extends AppModel {

        public function checkEmail($email) {
            $user = new User();

            $condition = array('email' => $email);
            $result =  $user->hasAny($condition);

            return $result;
        }

    }