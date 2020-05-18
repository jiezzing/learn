<?php

App::uses('Controller', 'Controller');
App::uses('CakeTime', 'Utility');

class AppController extends Controller {
    public $components = array(
        'DebugKit.Toolbar',
        'RequestHandler',
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'home',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'login',
                'action' => 'index'
            ),
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'User',
                    'fields' => array(
                        'username' => 'email',
                        'password' => 'password'
                    )
                )
            ),
            'loginAction' => array(
                'controller' => 'login',
                'action' => 'index'
            )
        ) 
    );

    public function beforeFilter() {
        parent::beforeFilter();

        // configure path
        App::build(array(
          'Model' => array(CAKE_CORE_INCLUDE_PATH . '/Model/'),
          'Lib' => array(CAKE_CORE_INCLUDE_PATH . '/Lib/')
        ));

        // autoload library
        App::uses('Output', 'Lib');
        
    	$user = ClassRegistry::init('User');
        $profile = $user->profile($this->Auth->user('id'));

        $this->set('profile', $profile);
	}
}
