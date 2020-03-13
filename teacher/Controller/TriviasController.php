<?php

    class TriviasController extends AppController{

        public $uses = array(
            'Trivia',
            'Common'
        );

        public $userID = null;
        public $univID = null;

        public function beforeFilter() {
            parent::beforeFilter();

            $this->userID = $this->Session->read('user_id');
            $this->univID = $this->Session->read('univ_id');
        }

        public function index() {
            $trivias = $this->Trivia->fetchTrivias($this->univID);

            $this->set('page', 'Trivias');
            $this->set('trivia', $trivias);
        }

        public function create() {
            $this->autoRender = false;

            if($this->request->is('ajax')) {
                $result = $this->Trivia->createTrivia(
                    $this->userID,
                    $this->univID,
                    json_encode($this->request->data['trivia']),
                    2
                );

                if($result) {
                    $response = array(
                        'status' => 1,
                        'message' => 'Trivia has been successfully created.'
                    );
                }
                else {
                    $response = array(
                        'status' => 0,
                        'message' => 'An error occured processing your request. Please try again.'
                    );
                }
            }

            return $this->Common->response($response);
        }

    }
?>
