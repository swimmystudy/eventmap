<?php

App::uses('AppModel', 'Model');

/**
 * Search Model
 *
 * @property Search $Search
 */
class Search extends AppModel {

	public $useTable = 'event_cache';
	public $order = array('Search.id DESC');
	public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
//		'title' => array('type' => 'query', 'method' => 'multipleKeywords'),
		'title' => array('type' => 'like', 'field' => array('Search.title', 'Search.description'), 'connectorOr' => ' ', 'connectorAnd' => '+'),
		'from' => array('type' => 'value', 'field' => 'Search.started_at >='),
		'to' => array('type' => 'value', 'field' => 'Search.started_at <='),
	);

	public function multipleKeywords($data = array()) {
		$keyword = mb_convert_kana($data['title'], "s", "UTF-8");
		$keywords = explode(' ', $keyword);

		if (count($keywords) < 2) {
			$conditions['OR'] = array();
			$condition = array(
				$this->alias . '.title LIKE' => '%' . $keyword . '%',
				$this->alias . '.description LIKE' => '%' . $keyword . '%',
			);
			array_push($conditions['OR'], $condition);
		} else {
			$conditions['AND'] = array();
			foreach ($keywords as $count => $keyword) {
				$condition = array(
					$this->alias . '.title LIKE' => '%' . $keyword . '%',
					$this->alias . '.description LIKE' => '%' . $keyword . '%',
				);
				array_push($conditions['AND'], $condition);
			}
		}
		return $conditions;
	}

}
