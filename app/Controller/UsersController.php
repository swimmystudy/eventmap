<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property Event $Event
 */
class UsersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
	}


	public function opauth_complete(){
		debug($this->data);
	}

}
