<?php 
	class Output {

		public static function response($data = array()) {
            return json_encode($data);
        }

        public static function error($message = null) {
            $data = array(
                'status' => 0,
                'message' => $message,
                'type' => 'Error'
            );

            return $data;
        }

        public static function success($message = null, $result = null) {
            $data = array(
                'status' => 1,
                'message' => $message,
                'type' => 'Success',
                'result' => $result
            );

            return $data;
        }

        public static function info($message = null) {
            $data = array(
                'status' => 1,
                'message' => $message,
                'type' => 'Info'
            );

            return $data;
        }

        public static function message($key = null) {
            $data = array(
                'successLogin' => 'Successfully logged in.',
                'errorLogin' => 'Invalid username or password. Please try again.',
                'registered' => 'Account has been successfully created.',
                'error' => 'An error occured upon processing your request. Please try again.',
                'emailExist' => 'Email address already exist. Please try again.',
                'message' => 'Request has been successfully created.',
                'nameExist' => 'Name already exist. Please try again.',
                'file' => 'Files has been successfully uploaded.',
                'update' => 'Successfully updated.',
                'noChanges' => 'No changes detected.',
                'delete' => 'Successfully deleted.',
                'uploadFail' => 'An error occured upon uploading file. Please try again.',
                'verifyPassword' => 'You can now update your current password.',
            );

            return $data[$key];
        }

	}
