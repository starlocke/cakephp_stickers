<?php
App::uses('Sticker', 'Model');

/**
 * Sticker Test Case
 *
 */
class StickerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sticker'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Sticker = ClassRegistry::init('Sticker');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sticker);

		parent::tearDown();
	}

}
