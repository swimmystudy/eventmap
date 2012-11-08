<?php

App::uses('AppController', 'Controller');

/**
 * Searches Controller
 *
 * @property Searches $Searches
 */
class SearchesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Search->recursive = 0;
		$this->set('searches', $this->paginate());
	}

}
