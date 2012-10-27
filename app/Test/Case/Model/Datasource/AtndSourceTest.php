<?php
App::uses('Model', 'Model');
App::uses('AppModel', 'Model');
App::uses('AtndSource', 'Model/Datasource');

/**
 * Post Model for the test
 *
 * @package       app
 * @subpackage    app.model.post
 */
class Post extends AppModel {

    public $useDbConfig = 'atnd';

}



class AtndSourceTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
    public function setUp() {
        parent::setUp();
        $this->AtndSource = ClassRegistry::init('AtndSource');
    }
/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
	    unset($this->AtndSource);
	    parent::tearDown();
	}
/**
 * [test description]
 * @return [type]
 */
    public function test(){
    	var_dump($this->AtndSource);
    }

}
