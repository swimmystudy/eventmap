<?php

App::uses('AppModel', 'Model');

/**
 * Search Model
 *
 * @property Search $Search
 */
class Search extends AppModel {

	public $useTable = 'event_cache';
	public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
		'title' => array('type' => 'like'),
		'from' => array('type' => 'value', 'field' => 'Search.started_at >='),
		'to' => array('type' => 'value', 'field' => 'Search.started_at <='),
	);
	public $order = array('Search.id DESC');

}
