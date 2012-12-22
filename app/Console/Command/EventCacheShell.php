<?php
/**
 *
 * イベント
 * 
 */
App::uses('ClassRegistry', 'Utility');
App::uses('Event', 'Model');

class EventCacheShell extends Shell {


	public function __construct($stdout = null, $stderr = null, $stdin = null) {
		parent::__construct($stdout, $stderr, $stdin);
		$this->Event = ClassRegistry::init('Event');
		$this->Event->getDataSource();
	}
/**
 * main method
 *
 */
	public function main(){
		$this->start();
		$this->get();
		$this->close();
	}
/**
 * start method
 *
 */
 	public function start(){
		$this->start = microtime(true);
		CakeLog::write('info','Rebuild Started...');
 	}

/**
 * [get description]
 * @return [type] [description]
 */
    public function get() {
		$this->Event->ServiceProvider->displayField = 'api_url';
		$serviceProviders = $this->Event->ServiceProvider->find('list');
		var_dump($serviceProviders);exit;
		foreach ($serviceProviders as $sp => $url) {
			$this->Event->update($sp, $url);
        }        
    }

/**
 * close method
 *
 */
 	public function close(){
		$end = microtime(true);
		$time = $end - $this->start;
		$minute = $time/60;
		CakeLog::write('info','Rebuild Finished...Time='.$minute.'分');
 	}



}