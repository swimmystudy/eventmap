<?php

App::uses('AppController', 'Controller');

/**
 * Searches Controller
 *
 * @property Searches $Searches
 */
class SearchesController extends AppController {

	public $components = array('Search.Prg');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Prg->commonProcess();
		$this->paginate = array(
			'conditions' => $this->Search->parseCriteria($this->passedArgs)
		);
		$this->set('searches', $this->paginate());
	}
}
