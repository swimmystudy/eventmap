<?php
/**
 * パーミッションを再構築
 *
 */
App::uses('ReBuildAccessUserShell','Console/Command');
App::uses('Article', 'Model');
App::uses('User', 'Model');

class ReBuildAccessUserShellTest extends CakeTestCase {


	public $fixtures = array(
			'app.article',
			'app.article_group',
			'app.user',
			'app.section',
			'app.article_media',
			'app.article_role',	
	);
/**
 * setup test
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$out = $this->getMock('ConsoleOutput', array(), array(), '', false);
		$in = $this->getMock('ConsoleInput', array(), array(), '', false);

		$this->Shell = $this->getMock(
			'ReBuildAccessUserShell',
			array('main'),
			array($out, $out, $in)
		);
		// $this->Shell = ClassRegistry::init('ReBuildAccessUserShellTest');
		$this->Article = ClassRegistry::init('Article');
		$this->User = ClassRegistry::init('User');
	}

/**
 * teardown method
 *
 * @return void
 */
	public function tearDown() {
		parent::tearDown();
		unset($this->Shell);
		unset($this->Article);
		unset($this->User);
		ClassRegistry::flush();
	}

/**
 * @test main method
 *
 * @return void
 */
	public function testMain() {
		$this->assertTrue(!file_exists(REBUILD_LOCK_FILE));
		$this->Shell->start();
		$this->assertTrue(file_exists(REBUILD_LOCK_FILE));
		$this->Shell->main();
		$this->Shell->closed();
		$this->assertTrue(!file_exists(REBUILD_LOCK_FILE));

	}




}