<?php

App::uses('AppController', 'Controller');
App::uses('Atnd', 'Model');
App::uses('Tweet', 'Model');
App::uses('Connpass', 'Model');

/**
 * Search Controller
 *
 *
 */
class SearchController extends AppController {

	public $uses = array(
		'Tweet','Atnd','Connpass'
	);

	public function beforeFilter(){
		parent::beforeFilter();
	}


	public function index(){
		//月別に
		// $tweets = $this->Atnd->find('all',array(
		// 		'conditions'=>array('ymd'=>date('ymd'))
		// ));
		// pr($tweets);
		// $tweets = $this->Connpass->find('all',array('conditions'=>array(
		// $now = date('ymd');
		// $tweets = $this->Atnd->find('all',array('conditions'=>array(
		// 				'ymd'=>$now)));
	}

	public function request(){
		pr($this->request->query);
		$result = $this->Atnd->find('all',array(
			'conditions'=>$this->request->query
		));
		var_dump($result);exit;
	}

}
