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

	public function dummy(){
		$data = array(
			array(
				'event_id'=>'1234',
				'service_provider'=>'Atnd',
				'title'=>'テストイベント',
				'description'=>'説明',
				'event_url'=>'http://test.com/',
				'started_at'=>'2012-11-04T08:30:00+09:00',
				'ended_at'=>'2012-11-04T08:30:00+09:00',
				'place'=>'福岡県Ruby・コンテンツ産業振興センター',
			)
		);
		// return new CakeResponse();
	}

}
