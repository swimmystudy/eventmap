<?php
App::uses('HttpSocket', 'Network/Http');

class AtndSourceTest extends CakeTestCase {

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
}
