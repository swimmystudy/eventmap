<?php
App::uses('AtndModel', 'Model');


class TestModel extends Model(){
	public $useDbConfig = 'atnd';
	public $useTable = false;
}

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
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		parent::tearDown();
	}
/**
 * @test
 * @todo
 * 
 */
	public function twitterID(){
		$TestModel = new TestModel();
		var_dump($TestModel);
	}


}
