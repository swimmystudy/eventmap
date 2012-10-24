<?php
App::uses('AppModel', 'Model');

class Atnd extends Model {

	public $useDbConfig = 'atnd';

	public $useTable = false;


	public function afterFind($results, $primary = false) {
		if(array_key_exists('events',$results)){
			return $this->prepareData($results['events']);
		}
		return $results;
	}
/**
 * event cache に合わせてデータ返す
 * 
 * @param  [type] $results [description]
 * @return [type]
 */

	public function prepareData($results){
		$return = array();
		foreach ($results as $key => $value) {
			$tmp = array(
				'event_id'=>$value['event_id'],
				'service_provider'=>'Atnd',
				'title'=>$value['title'],
				'description'=>$value['description'],
				'event_url'=>$value['event_url'],
				'started_at'=>$value['started_at'],
				'ended_at'=>$value['ended_at'],
				'place'=>$value['place'],
			);
			$return[] = $tmp;
		}
		return $return;
	}
/**
 * event cash とのマッピング
 * 
 * @var array
 */

    private $schema_map = array(
        'event_id',
        'service_provider',
        'title',
        'description',
        'event_url',
        'started_at',
        'ended_at',
        'place',
        'created',
        'modified',
    );

}
