<?php

App::uses('AppController', 'Controller');
App::uses('Atnd', 'Model');
App::uses('Tweet', 'Model');

/**
 * Search Controller
 *
 *
 */
class SearchController extends AppController {

	public $uses = array(
		'Tweet','Atnd'
	);

	public function index() {
		$tweets = $this->Atnd->find('all',array('conditions'=>array('owner_twitter_id'=>'mawatarin')));
		// $tweets = $this->Tweet->find('all',array('conditions'=>array('username'=>'ootatter')));
	}
}
