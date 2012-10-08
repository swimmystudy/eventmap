<?php
App::uses('AtndModel', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AtndTestCase extends CakeTestCase {
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
		$this->Atnd = ClassRegistry::init('Atnd');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Atnd);
		parent::tearDown();
	}
/**
 * @test
 * @todo
 * 
 */
	public function twitterID(){
		var_dump($this->Atnd);
	}


}
