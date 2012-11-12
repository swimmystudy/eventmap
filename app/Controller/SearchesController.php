<?php

App::uses('AppController', 'Controller');

/**
 * Searches Controller
 *
 * @property Search $Search
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

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Search->id = $id;
		if (!$this->Search->exists()) {
			throw new NotFoundException(__('Invalid %s', __('search')));
		}
		$this->set('search', $this->Search->read(null, $id));
	}
}
