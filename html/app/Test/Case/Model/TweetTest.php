<?php
App::uses('Tweet', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class TweetTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array();

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tweet = ClassRegistry::init('Tweet');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tweet);
		parent::tearDown();
	}
/**
 * @test
 * @todo
 * 
 */
	public function twitterID(){
		var_dump($this->Tweet);exit;
		$tweets = $this->Tweet->find('all');

		$conditions= array('username' => 'ootatter');
		$otherTweets = $this->Tweet->find('all', compact('conditions'));

		var_dump($otherTweets);
	}


}
